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
        return view('admin.survey.index');
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(SurveyRequest $request)
    {
        if (Survey::create($request->all())) {
            return redirect()->route(ADMIN_MANAGER_SURVEY);
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Thêm thất bại.');
        }
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}

