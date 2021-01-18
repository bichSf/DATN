<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'name',
    ];

    public function provincial()
    {
        return $this->belongsTo(Province::class, 'id', 'provincial_id');
    }

    public function getDistrictFromProvince($provinceId)
    {
        return $this->where('province_id', $provinceId)->orderBy('name')->get()->toArray();
    }
}
