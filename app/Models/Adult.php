<?php

namespace App\Models;

use App\Traits\CommonFunction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adult extends Model
{
    use HasFactory;
    use CommonFunction;

    protected $table = 'adults_20_60';

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
        'fat_percentage',
        'survey_id',
        'gender',
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

    public function getAvgWeightHeight($type, $year)
    {
        $years = $this->getArrayYear($year);
        $data = $this->join('surveys', 'adults_20_60.survey_id', '=', 'surveys.id')->selectRaw('avg('.$type.') as avg, year, gender')
            ->whereIn('surveys.year', $years)
            ->groupBy(['surveys.year','gender'])
            ->orderBy('surveys.year')
        ->get();
        $dataMan = $data->where('gender', false)->map(function ($item) use ($type) {
            $rand = $type == 'weight' ? rand(-2, 2) : rand(-5, 5);
            return round($item['avg'] + $rand, 2);
        })->toArray();
        $dataWoman = $data->where('gender', true)->map(function ($item) use ($type) {
            $rand = $type == 'weight' ? rand(-2, 2) : rand(-5, 5);
            return round($item['avg'] + $rand, 2);
        })->toArray();
        $dataReturn = [
            'categories' => $years,
            'data' => [
                [
                    'name' => 'Nam',
                    'data' => array_values($dataMan)
                ] ,
                [
                    'name' => 'Nữ',
                    'data' => array_values($dataWoman)
                ]
            ]
        ];
        return $dataReturn;
    }

    public function getArrayYear($year)
    {
        $data = [];
        for ($i = $year - 4; $i <= $year; $i++) {
            array_push($data, $i);
        }
        return $data;
    }

    public function getBMI($year)
    {
        $data = $this->selectRaw('weight / (height*height/10000) as bmi')->whereHas('survey', function ($query) use ($year) {
            return $query->where('year', $year);
        })->get()->toArray();
        $data = array_column($data, 'bmi');
        $dataReturn = [];
        foreach (BMI_RATE as $key => $value) {
            $div2 = array_filter($data, function($item) use ($value) {
                // condition which makes a result belong to div2.
                return $item >= $value[0] && $item < $value[1];
            });
            array_push($dataReturn, [
                'name' => $key,
                'y' => round(count($div2) / count($data) * 100, 2)
            ]);
        }
        return $dataReturn;
    }

    public function getDataSpiderChart($params)
    {
        $bmi = getBMIPoint($params['weight'], $params['height']);
        return [
            'categories' => ['Cân nặng','Chiều cao', 'Vòng cánh tay', 'Nếp gấp da ở cơ tam đầu', 'Phần trăm mỡ của cơ thể'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['arm_circumference'], (float)$params['biceps_skinfold'],  (float)$params['fat_percentage']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttributeAdult($params['year'], $params['area'], $params['gender'])
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

    public function getAvgAttributeAdult($year, $area, $gender = 0)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(arm_circumference), 2) as avg_arm_circumference, round(avg(biceps_skinfold), 2) as avg_biceps_skinfold, round(avg(fat_percentage), 2) as avg_fat_percentage')
            ->where('gender', $gender)
            ->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
