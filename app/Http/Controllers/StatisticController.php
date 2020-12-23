<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Infant;

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
    const INFANTS = 'infants_0_0';
    const TODDLER = 'toddlers_1_60';
    const CHILDREN = 'children_5_11';
    const TEENS = 'teens_11_20';
    const ADULTS = 'adults_20_60';
    const SENIORS = 'seniors_60_100';
    public function store(DataRequest $request)
    {
        $data = $request->all();
        switch ($data['table_type']) {
            case INFANTS:
                Infant::create($data);
                break;
        }
    }

    public function showPopulation()
    {
        return view('user.statistic.population');
    }
}
