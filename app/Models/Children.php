<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $table = 'children_5_11';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight',
        'height',
        'arm_circumference',
        'head_circumference',
        'chest_circumference',
        'biceps_skinfold',
        'survey_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    public function getZcore($year = 2000)
    {
        $avg = $this->selectRaw('avg(weight)')->whereHas('survey', function ($query) use ($year) {
            return $query->where('year', $year);
        })->first()->toArray()['avg'];
        $data = $this->selectRaw('round(CAST(FLOAT8 (weight - '.$avg.') / 3.5 AS NUMERIC), 2) as zscore')->whereHas('survey', function ($query) use ($year) {
            return $query->where('year', $year);
        })->orderBy('weight')->get()->toArray();
        return array_column($data, 'zscore');

    }

    public function getDataColumnChart($yearTo)
    {
        $dataReturn = [];
        for ($year = $yearTo - 4; $year <= $yearTo; $year++) {
            $data = $this->getZcore($year);
            $div2 = array_filter($data, function($item) {
                // condition which makes a result belong to div2.
                return $item < LIM_SDD;
            });
            $dataItem = [
                'name' => $year,
                'y' => round(count($div2) / count($data) * 100, 2)
            ];
            array_push($dataReturn, $dataItem);
        }
        return $dataReturn;
    }
}
