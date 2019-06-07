<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ModelCar extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'models';

    protected $fillable = [
        'id', 'description', 'ano', 'fabric'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'model_id');
    }


}
