<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    /**
     * Show index
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.survey.index', [
            'listSurvey' => Survey::orderByDesc('id')->paginate(PAGINATE)
        ]);
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(SurveyRequest $request)
    {
        if (Survey::create($request->all())) {
            return redirect()->route(ADMIN_MANAGER_SURVEY)->with(STR_SUCCESS_FLASH, 'Thêm thành công.');
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Thêm thất bại.');
        }
    }

    public function edit($id)
    {
        abort_if(empty(Survey::find($id)), 404);
        return view('admin.survey.edit', [
            'survey' => Survey::find($id)
        ]);
    }

    public function update(SurveyRequest $request, $id)
    {
        abort_if(empty(Survey::find($id)), 404);
        if (Survey::where('id', $id)->update($request->except('_token'))) {
            return redirect()->route(ADMIN_MANAGER_SURVEY)->with(STR_SUCCESS_FLASH, 'Chỉnh sửa thành công.');
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Chỉnh sửa thất bại.');
        }
    }

    public function destroy($id)
    {
        $survey = Survey::find($id);
        abort_if(empty($survey), 404);
        $survey && $survey->delete() ? Session::flash(STR_SUCCESS_FLASH, 'Xoá thành công.') : Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
        return redirect()->back();
    }
}

