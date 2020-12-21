<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use Illuminate\Http\Request;

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
            'listSurvey' => Survey::paginate(PAGINATE)
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
        return view('admin.survey.edit', [
            'survey' => Survey::find($id)
        ]);
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}

