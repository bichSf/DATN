<?php

namespace App\Models;

use App\Traits\CommonFunction;
use App\Traits\StatisticNutrition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infant extends Model
{
    use HasFactory;
    use StatisticNutrition;
    use CommonFunction;

    protected $table = 'infants_0_0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight',
        'height',
        'head_circumference',
        'survey_id',
        'gender',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    public function getDataSpiderChart($params)
    {
        $bmi = getBMIPoint($params['weight'], $params['height']);
        return [
            'categories' => ['Cân nặng','Chiều cao', 'Vòng đầu'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['head_circumference']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttributeInfant($params['year'], $params['area'], $params['gender'])
                ]
            ],
            'data_detail' => [
                'z_score' => $this->getZScoreWH($params),
                'bmi' => $bmi,
                'z_bmi_status' => getStatusBMI($bmi),
                'weight_ideal' => getWeightIdeal($params['height']),
            ]
        ];
    }

    public function getAvgAttributeInfant($year, $area, $gender = 0)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(head_circumference), 2) as avg_head_circumference')
            ->where('gender', $gender)
            ->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
