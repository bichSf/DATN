<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'area_id',
        'year',
        'month',
    ];

    public function getAllRecords()
    {
        return $this->orderBy('id', 'desc')->get()->toArray();
    }

    public static function getMaxId()
    {
        return Survey::orderBy('id', 'desc')->take(1)->first()->toArray()['id'];
    }

    public static function getRangeYear()
    {
        return Survey::select('year')->groupBy('year')->orderBy('year', 'desc')->pluck('year')->toArray();
    }
}
