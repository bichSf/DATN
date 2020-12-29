<?php

namespace App\Http\Controllers;
use App\Http\Requests\DataRequest;
use App\Models\Adult;
use App\Models\Children;
use App\Models\Infant;
use App\Models\Senior;
use App\Models\Survey;
use App\Models\Teen;
use App\Models\Toddler;

class HomeController extends Controller
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
        Teen $teen,
        Children $children,
        Adult $adult,
        Senior $senior
    ) {
        $this->survey = $survey;
        $this->infant = $infant;
        $this->toddler = $toddler;
        $this->teen = $teen;
        $this->children = $children;
        $this->adult = $adult;
        $this->senior = $senior;
    }
    /**
     * Show top site
     *
     * @return mixed
     */
    public function index()
    {
        return view('simulation.simulation');
    }

    public function seeResults(DataRequest $request)
    {
        $params = $request->all();
        $params['table_type'] = $params['table_type'] ?? INFANTS;
        switch ($params['table_type']) {
            case INFANTS:
                return $this->infant->getDataSpiderChart($params);
            case TODDLER:
                return $this->toddler->getDataSpiderChart($params);
            case CHILDREN:
                return $this->children->getDataSpiderChart($params);
            case TEENS:
                return $this->teen->getDataSpiderChart($params);
            case ADULTS:
                return $this->adult->getDataSpiderChart($params);
            case SENIORS:
                return $this->senior->getDataSpiderChart($params);
        }
    }
}
