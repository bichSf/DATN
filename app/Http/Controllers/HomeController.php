<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show top site
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.statistic.index');
    }
}
