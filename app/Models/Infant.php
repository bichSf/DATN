<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infant extends Model
{
    use HasFactory;

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
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    public function getZcore()
    {
        $avg = $this->selectRaw('avg(weight)')->whereHas('survey', function ($query) {
            return $query->where('year', 2001);
        })->first()->toArray()['avg'];
        $data = $this->selectRaw('round(CAST(FLOAT8 (infants_0_0.weight - '.$avg.') / 3.5 AS NUMERIC), 2) as zscore')->whereHas('survey', function ($query) {
            return $query->where('year', 2001);
        })->orderBy('weight')->get()->toArray();
        return array_column($data, 'zscore');

    }
}
