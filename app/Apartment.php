<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Apartment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'apartment';

    protected $fillable = [
        'number', 'floor'
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class, 'resident_id');
    }

    public function sensors()
    {
        return $this->belongsToMany(Sensor::class, 'sensors_apartments')->withPivot('is_on');
    }


}
