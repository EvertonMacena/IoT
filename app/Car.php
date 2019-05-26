<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Car extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'cars';

    protected $fillable = [
        'id', 'model_id', 'resident_id', 'board', 'tag'
    ];

    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id');
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }


}
