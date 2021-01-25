<?php

namespace App\Models;

use App\Traits\CommonFunction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
    use HasFactory;
    use CommonFunction;

    protected $table = 'seniors_60_100';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight',
        'height',
        'arm_circumference',
        'biceps_skinfold',
        'knee_height',
        'stomach_feet',
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
            'categories' => ['Cân nặng','Chiều cao', 'Vòng cánh tay', 'Nếp gấp da ở cơ tam đầu', 'Chiều cao đầu gối', 'Vòng bụng chân'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['arm_circumference'], (float)$params['biceps_skinfold'], (float)$params['knee_height'], (float)$params['stomach_feet']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttributeSenior($params['year'], $params['area'], $params['gender'])
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

    public function getAvgAttributeSenior($year, $area, $gender = 0)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(arm_circumference), 2) as avg_arm_circumference, round(avg(biceps_skinfold), 2) as avg_biceps_skinfold,
         round(avg(knee_height), 2) as avg_knee_height, round(avg(stomach_feet), 2) as avg_stomach_feet')
            ->where('gender', $gender)
            ->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
