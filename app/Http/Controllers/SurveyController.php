<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    private $survey;

    public function __construct(Survey $survey ) {
        $this->survey = $survey;
    }

    /**
     * Show index
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $listSurvey = $this->survey->when(isset($params['area_id']), function ($q) use ($params) {
            return $q->where('area_id', $params['area_id']);
        })->when(isset($params['month']), function ($q) use ($params) {
            return $q->where('month', $params['month']);
        })->when(isset($params['year']), function ($q) use ($params) {
            return $q->where('year', $params['year']);
        })
            ->selectRaw('*')
            ->selectRaw('CASE WHEN (SELECT COUNT(survey_id) FROM adults_20_60 WHERE survey_id = surveys.id) = 0 
            AND (SELECT COUNT(survey_id) FROM children_5_11 WHERE survey_id = surveys.id) = 0 
            AND (SELECT COUNT(survey_id) FROM infants_0_0 WHERE survey_id = surveys.id) = 0 
            AND (SELECT COUNT(survey_id) FROM seniors_60_100 WHERE survey_id = surveys.id) = 0 
            AND (SELECT COUNT(survey_id) FROM teens_11_20 WHERE survey_id = surveys.id) = 0 
            AND (SELECT COUNT(survey_id) FROM toddlers_1_60 WHERE survey_id = surveys.id) = 0 
            THEN 0 ELSE 1 END as done')
            ->orderByDesc('id')->paginate(PAGINATE);

        return view('admin.survey.index', [
            'params' => $params,
            'listSurvey' => $listSurvey
        ]);
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(SurveyRequest $request)
    {
        if ($this->survey->create($request->all())) {
            return redirect()->route(ADMIN_MANAGER_SURVEY)->with(STR_SUCCESS_FLASH, 'Thêm thành công.');
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Thêm thất bại.');
        }
    }

    public function edit($id)
    {
        $survey = $this->survey->find($id);
        abort_if(empty($survey), 404);
        return view('admin.survey.edit', [
            'survey' => $survey
        ]);
    }

    public function update(SurveyRequest $request, $id)
    {
        abort_if(empty($this->survey->find($id)), 404);
        if ($this->survey->where('id', $id)->update($request->except('_token'))) {
            return redirect()->route(ADMIN_MANAGER_SURVEY)->with(STR_SUCCESS_FLASH, 'Chỉnh sửa thành công.');
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Chỉnh sửa thất bại.');
        }
    }

    public function destroy($id)
    {
        $survey = $this->survey->find($id);
        abort_if(empty($survey), 404);
        $survey && $survey->delete() ? Session::flash(STR_SUCCESS_FLASH, 'Xoá thành công.') : Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
        return redirect()->back();
    }
}

