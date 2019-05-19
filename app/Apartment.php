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


}
