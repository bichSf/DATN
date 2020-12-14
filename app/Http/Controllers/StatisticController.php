<?php

namespace App\Http\Controllers;

class StatisticController extends Controller
{
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
        return view('user.statistic.create');
    }

    public function store()
    {

    }

    public function showPopulation()
    {
        return view('user.statistic.population');
    }
}
