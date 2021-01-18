<?php

namespace App\Models;

use App\Traits\CommonFunction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teen extends Model
{
    use HasFactory;
    use CommonFunction;

    protected $table = 'teens_11_20';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight',
        'height',
        'biceps_skinfold',
        'fat_percentage',
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
            'categories' => ['Cân nặng','Chiều cao', 'Nếp gấp da ở cơ tam đầu', 'Phần trăm mỡ của cơ thể'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['biceps_skinfold'],  (float)$params['fat_percentage']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttributeTeen($params['year'], $params['area'], $params['gender'])
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

    public function getAvgAttributeTeen($year, $area, $gender = 0)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(biceps_skinfold), 2) as avg_biceps_skinfold, round(avg(fat_percentage), 2) as avg_fat_percentage')
            ->where('gender', $gender)
            ->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
