<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'area_id',
    ];

    public function getAllRecords()
    {
        return $this->orderBy('name')->get()->toArray();
    }
}
