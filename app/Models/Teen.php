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
}
