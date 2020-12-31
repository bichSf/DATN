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
}
