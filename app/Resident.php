<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Resident extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'residents';

    protected $fillable = [
        'name', 'lastname', 'apartment_id', 'contact', 'email'
    ];

    public function car()
    {
        return $this->hasOne(Car::class, 'resident_id');
    }

    public  function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id');
    }

    public  function user()
    {
        return $this->belongsTo(Apartment::class, 'user_id');
    }


}
