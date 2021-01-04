<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

trait CommonFunction
{
    /**
     * @param $params
     * @return float
     */
    public function getZScoreWH($params)
    {
        $avg = $this->selectRaw('avg(weight / height) as avg')->whereHas('survey', function ($query) use ($params) {
            return $query->where('year', $params['year']);
        })->first()->toArray()['avg'];
        return round((($params['weight'] / $params['height']) - $avg) / STANDARD_DEVIATION, 2);
    }

    /**
     * @param $listData
     * @return bool
     */
    public function createMany($listData)
    {
        DB::beginTransaction();
        try {
            foreach ($listData as $data) {
                $rules = getRuleDataRequest($this->table, '');
                $validator = Validator::make($data, $rules);
                if ($validator->fails()){
                    DB::rollBack();
                    return false;
                }
                $this->create($data);
            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }
    }

    public function getDataMultipleColumnChart($params)
    {
        $maxYear = max(getRangeYearSurvey());
        $dataReturn = [];
        $numberColor = 1;
        for ($year = $maxYear - 4; $year <= $maxYear; $year++) {
            array_push($dataReturn, $this->getDataBMIYearArea('rgb(15,54,103,'.$numberColor.')', $year, $params['area'] ?? null));
            $numberColor-=0.15;
        }
        return $dataReturn;
    }

    public function getDataBMIYearArea($color, $year = 2015, $area = 1)
    {
        $thin = $this->whereRaw('weight/(height*height/10000) < 18.5')
            ->whereHas('survey', function ($query) use ($year, $area) {
                return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                    return $query->where('area_id', $area);
                });
            })->count();
        $normal = $this->whereRaw('weight/(height*height/10000) >= 18.5 and weight/(height*height/10000) < 25')
            ->whereHas('survey', function ($query) use ($year, $area) {
                return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                    return $query->where('area_id', $area);
                });
            })->count();
        $fat = $this->whereRaw('weight/(height*height/10000) >= 25')
            ->whereHas('survey', function ($query) use ($year, $area) {
                return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                    return $query->where('area_id', $area);
                });
            })->count();
        $total = $thin + $normal + $fat;
        return [
            'name' => $year,
            'data' => [
                round($thin/$total*100, 2),
                round($normal/$total*100, 2),
                round($fat/$total*100, 2)
            ],
            'color' => $color
        ];
    }
}
