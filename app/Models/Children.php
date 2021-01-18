<?php

namespace App\Models;

use App\Traits\CommonFunction;
use App\Traits\StatisticNutrition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    use StatisticNutrition;
    use CommonFunction;

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
        'gender',
        'survey_id',
        'province_id',
        'district_id',
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
            'categories' => ['Cân nặng','Chiều cao', 'Vòng cánh tay', 'Vòng đầu', 'Vòng ngực', 'Nếp gấp da ở cơ tam đầu'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['arm_circumference'],
                        (float)$params['head_circumference'], (float)$params['chest_circumference'], (float)$params['biceps_skinfold']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttributeChildren($params['year'], $params['area'], $params['gender'])
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

    public function getAvgAttributeChildren($year, $area, $gender = 0)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(arm_circumference), 2) as avg_arm_circumference,
        round(avg(head_circumference), 2) as avg_head_circumference, round(avg(chest_circumference), 2) as avg_chest_circumference, round(avg(biceps_skinfold), 2) as avg_biceps_skinfold')
            ->where('gender', $gender)
            ->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
