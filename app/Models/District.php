<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provincial_id',
        'name',
    ];

    public function provincial()
    {
        return $this->belongsTo(Provincial::class, 'id', 'provincial_id');
    }

    public function getDistrictFromProvincial($provincialId)
    {
        return $this->where('provincial_id', $provincialId)->get()->toArray();
    }
}
