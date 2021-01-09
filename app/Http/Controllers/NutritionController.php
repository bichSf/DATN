<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Libraries\Export\TemplateCsv;
use App\Models\Infant;
use App\Models\Adult;
use App\Models\Children;
use App\Models\Senior;
use App\Models\Teen;
use App\Models\Survey;
use App\Models\Toddler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;

class NutritionController extends Controller
{
    private $survey;
    private $infant;
    private $toddler;
    private $children;
    private $adult;
    private $teen;
    private $senior;

    public function __construct
    (
        Survey $survey,
        Infant $infant,
        Toddler $toddler,
        Children $children,
        Adult $adult,
        Teen $teen,
        Senior $senior
    ) {
        $this->survey = $survey;
        $this->infant = $infant;
        $this->toddler = $toddler;
        $this->children = $children;
        $this->adult = $adult;
        $this->teen = $teen;
        $this->senior = $senior;
    }

    /**
     * Show top site
     *
     * @return mixed
     */
    public function showStatistic()
    {
        return view('user.nutrition.statistic');
    }

    public function create()
    {
        $listSurvey = $this->survey->getAllRecords();
        return view('user.nutrition.create', compact('listSurvey'));
    }

    public function checkCsv(Request $request)
    {
        $data = array();
        if (($handle = fopen($_FILES['data_csv']['tmp_name'], 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000)) !== false) {
                array_push($data, $row);
            }
            fclose($handle);
        }
        $header = $data[0];
        unset($data[0]);
        return view('user.nutrition.form_view_csv')->with(['header' => $header, 'data' => $data]);
    }

    public function saveDataCsv(Request $request)
    {
        $tableType = $request->table_type;
        abort_if(!$tableType, 404);
        $arrayKey = ATTRIBUTE_DATA[$tableType];
        $data = array();
        if (($handle = fopen($_FILES['data_csv']['tmp_name'], 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000)) !== false) {
                if (count($arrayKey) !== count($row)) {
                    Session::flash(STR_ERROR_FLASH, 'Thêm thất bại.');
                    return redirect()->back();
                }
                array_push($data, array_combine($arrayKey, $row));
            }
            fclose($handle);
        }
        unset($data[0]);
        $check = false;
        switch ($tableType) {
            case INFANTS:
                $check = $this->infant->createMany($data);
                break;
            case TODDLER:
                $check = $this->toddler->createMany($data);
                break;
            case CHILDREN:
                $check = $this->children->createMany($data);
                break;
            case TEENS:
                $check = $this->teen->createMany($data);
                break;
            case ADULTS:
                $check = $this->adult->createMany($data);
                break;
            case SENIORS:
                $check = $this->senior->createMany($data);
                break;
        }
        if ($check) {
            Session::flash(STR_SUCCESS_FLASH, 'Thêm thành công.');
            return redirect()->route(USER_NUTRITION_INDEX);
        }
        Session::flash(STR_ERROR_FLASH, 'Thêm thất bại.');
        return redirect()->back();
    }

    public function downCsv(Request $request)
    {
        $export = new TemplateCsv();
        $export->setTableType($request->table_type);
        return Excel::download($export, $export->getFileName());
    }

    public function store(DataRequest $request)
    {
        try {
            $data = $request->all();
            switch ($data['table_type']) {
                case INFANTS:
                    Infant::create($data);
                    break;
                case TODDLER:
                    Toddler::create($data);
                    break;
                case CHILDREN:
                    Children::create($data);
                    break;
                case TEENS:
                    Teen::create($data);
                    break;
                case ADULTS:
                    Adult::create($data);
                    break;
                case SENIORS:
                    Senior::create($data);
                    break;
            }
            Session::flash(STR_SUCCESS_FLASH, 'Thêm thành công.');
            return response()->json(['save' => true]);
        } catch (Exception $exception) {
            report($exception);
            Session::flash(STR_ERROR_FLASH, 'Thêm thất bại.');
            return response()->json(['save' => false]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $table_type = $request->table_type;
            if (empty($table_type)) {
                Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
                return redirect(route(USER_NUTRITION_INDEX));
            }
            switch ($table_type) {
                case INFANTS:
                    $item = Infant::findOrFail($id);
                    break;
                case TODDLER:
                    $item = Toddler::findOrFail($id);
                    break;
                case CHILDREN:
                    $item = Children::findOrFail($id);
                    break;
                case TEENS:
                    $item = Teen::findOrFail($id);
                    break;
                case ADULTS:
                    $item = Adult::findOrFail($id);
                    break;
                case SENIORS:
                    $item = Senior::findOrFail($id);
                    break;
            }
            $item && $item->delete() ? Session::flash(STR_SUCCESS_FLASH, 'Xoá thành công.') : Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
            return redirect(route(USER_NUTRITION_INDEX));
        } catch (Exception $exception) {
            report($exception);
            Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
            return redirect(route(USER_NUTRITION_INDEX));
        }
    }

    public function destroyMulti(Request $request)
    {
        try {
            $table_type = $request->table_type;
            switch ($table_type) {
                case INFANTS:
                    $count = Infant::destroy($request->ids);
                    break;
                case TODDLER:
                    $count = Toddler::destroy($request->ids);
                    break;
                case CHILDREN:
                    $count = Children::destroy($request->ids);
                    break;
                case TEENS:
                    $count = Teen::destroy($request->ids);
                    break;
                case ADULTS:
                    $count = Adult::destroy($request->ids);
                    break;
                case SENIORS:
                    $count = Senior::destroy($request->ids);
                    break;
            }
            if ($count != 0 ) {
                return redirect(route(USER_NUTRITION_INDEX))->with(STR_SUCCESS_FLASH, 'Xoá thành công.');
            }
        } catch (\Exception $exception) {
            report($exception);
            return redirect(route(USER_NUTRITION_INDEX))->with(STR_ERROR_FLASH, 'Xoá thất bại.');
        }
    }

    public function getZscore(Request $request)
    {
        $tableType = $request->table_type ?? INFANTS;
        $year1 = $request->year_1 ?? 2008;
        $year2 = $request->year_2 ?? 2018;
        $area = $request->area;
        switch ($tableType) {
            case INFANTS:
            default:
                return response()->json(['data' => $this->infant->getDataZScoreWH($year1, $year2, $area)]);
            case TODDLER:
                return response()->json(['data' => $this->toddler->getDataZScoreWH($year1, $year2, $area)]);
            case CHILDREN:
                return response()->json(['data' => $this->children->getDataZScoreWH($year1, $year2, $area)]);
        }
    }

    public function getDataBmi(Request $request)
    {
        $year = $request->year ?? 2018;
        return response()->json(['data' => $this->adult->getBMI($year)]);
    }

    public function getColumnChart(Request $request)
    {
        $tableType = $request->table_type ?? INFANTS;
        $year = 2018;
        switch ($tableType) {
            case INFANTS:
                return response()->json(['data' => $this->infant->getDataColumnChart($year)]);
            case TODDLER:
                return response()->json(['data' => $this->toddler->getDataColumnChart($year)]);
            case CHILDREN:
                return response()->json(['data' => $this->children->getDataColumnChart($year)]);
        }

    }

    public function getAvgWeightHeight(Request $request)
    {
        $year = 2018;
        return response()->json([
            'weight' => $this->adult->getAvgWeightHeight('weight', $year),
            'height' => $this->adult->getAvgWeightHeight('height', $year),
        ]);

    }

    public function index(Request $request)
    {
        $params = $request->all();
        $tableType = (isset($params['table_type']) && in_array($params['table_type'], array_keys(TYPE_POPULATION_NAME))) ? $params['table_type'] : INFANTS;
        switch ($tableType) {
            case INFANTS:
                $data = Infant::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
            case TODDLER:
                $data = Toddler::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
            case CHILDREN:
                $data = Children::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
            case TEENS:
                $data = Teen::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
            case ADULTS:
                $data = Adult::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
            case SENIORS:
                $data = Senior::when(isset($params['survey_id']), function ($query) use ($params) {
                    return $query->where('survey_id', $params['survey_id']);
                })->orderByDesc('id')->paginate(PAGINATE);
                break;
        }
        return view('user.nutrition.index', [
            'params' => $params,
            'data' => $data,
            'tableType' => $tableType,
            'surveys' => $this->survey->getAllRecords(),
        ]);
    }

    public function getSurvey(Request $request)
    {
        $survey = $this->survey->find($request->survey_id) ?? $this->survey->get()->last();
        return response()->json(['data' => $survey->toArray()]);
    }
}
