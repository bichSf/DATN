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
}
