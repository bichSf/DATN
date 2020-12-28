<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Infant;
use App\Models\Adult;
use App\Models\Children;
use App\Models\Senior;
use App\Models\Teen;
use App\Models\Survey;
use App\Models\Toddler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class NutritionController extends Controller
{
    private $survey;
    private $infant;
    private $toddler;
    private $children;
    private $adult;

    public function __construct
    (
        Survey $survey,
        Infant $infant,
        Toddler $toddler,
        Children $children,
        Adult $adult
    )
    {
        $this->survey = $survey;
        $this->infant = $infant;
        $this->toddler = $toddler;
        $this->children = $children;
        $this->adult = $adult;
    }
    /**
     * Show top site
     *
     * @return mixed
     */
    public function index()
    {
        return view('user.statistic.index');
    }

    public function create()
    {
        $listSurvey = $this->survey->getAllRecords();
        return view('user.statistic.create', compact('listSurvey'));
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

    public function getZscore(Request $request)
    {
        $tableType = $request->table_type ?? INFANTS;
        $year1 = $request->year_1 ?? 2008;
        $year2 = $request->year_2 ?? 2018;
        $area = $request->area;
        switch ($tableType) {
            case INFANTS:
            default:
                return response()->json(['data' => $this->infant->getZScoreWH($year1, $year2, $area)]);
            case TODDLER:
                return response()->json(['data' => $this->toddler->getZScoreWH($year1, $year2, $area)]);
            case CHILDREN:
                return response()->json(['data' => $this->children->getZScoreWH($year1, $year2, $area)]);
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

    public function showPopulation(Request $request)
    {
        $params = $request->all();
        $tableType = (isset($params['table_type']) && in_array($params['table_type'], array_keys(TYPE_POPULATION_NAME))) ? $params['table_type'] : INFANTS;
        switch ($tableType) {
            case INFANTS:
                $data = Infant::get()->toArray();
                break;
            case TODDLER:
                $data = Toddler::get()->toArray();
                break;
            case CHILDREN:
                $data = Children::get()->toArray();
                break;
            case TEENS:
                $data = Teen::get()->toArray();
                break;
            case ADULTS:
                $data = Adult::get()->toArray();
                break;
            case SENIORS:
                $data = Senior::get()->toArray();
                break;
        }
        return view('user.statistic.population', compact('params', 'data'));
    }
}
