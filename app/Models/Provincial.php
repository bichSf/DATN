<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincial extends Model
{
    protected $table = 'provincial';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function getAllRecords()
    {
        return $this->get()->toArray();
    }
}
