<?php

namespace App\Traits;

trait CommonFunction
{
    public function getZScoreWH($params)
    {
        $avg = $this->selectRaw('avg(weight / height) as avg')->whereHas('survey', function ($query) use ($params) {
            return $query->where('year', $params['year']);
        })->first()->toArray()['avg'];
        return round((($params['weight'] / $params['height']) - $avg) / STANDARD_DEVIATION, 2);
    }
}
