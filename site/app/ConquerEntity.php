<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConquerEntity extends Model
{
    protected $table = "entities";
    protected $connection = 'conquer_mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Owner', 'ConquerPoints', 'Level', 'Class'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
