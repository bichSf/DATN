<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adult extends Model
{
    use HasFactory;

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
}
