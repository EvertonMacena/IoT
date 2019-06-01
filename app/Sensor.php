<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sensor extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'sensors';

    protected $fillable = [
        'id', 'name', 'description'
    ];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class, 'sensors_apartments')->withTimestamps()->withPivot('is_on', 'room');
    }


}
