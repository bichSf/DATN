<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teen extends Model
{
    use HasFactory;

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
        'survey_id',
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
        return [
            'categories' => ['Cân nặng','Chiều cao', 'Nếp gấp da ở cơ tam đầu', 'Phần trăm mỡ của cơ thể'],
            'data' => [
                [
                    'name' => 'Hiện trạng',
                    'data' => [(float)$params['weight'], (float)$params['height'], (float)$params['biceps_skinfold'],  (float)$params['fat_percentage']]
                ],
                [
                    'name' => 'Trung bình',
                    'data' =>  $this->getAvgAttribute($params['year'], $params['area'])
                ]
            ]
        ];
    }

    public function getAvgAttribute($year, $area)
    {
        $avg = $this->selectRaw('round(avg(weight), 2) as avg_weight, round(avg(height), 2) as avg_height, round(avg(biceps_skinfold), 2) as avg_biceps_skinfold, round(avg(fat_percentage), 2) as avg_fat_percentage')->whereHas('survey', function ($query) use ($year, $area) {
            return $query->where('year', $year)->when(!empty($area), function ($query) use ($area) {
                return $query->where('area_id', $area);
            });
        })->first()->toArray();
        return array_values($avg);
    }
}
