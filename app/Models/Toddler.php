<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toddler extends Model
{
    use HasFactory;

    protected $table = 'toddlers_1_60';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight',
        'height',
        'is_infant',
        'biceps_skinfold',
        'arm_circumference',
        'survey_id',
    ];
}
