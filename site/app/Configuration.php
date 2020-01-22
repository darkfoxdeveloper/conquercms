<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'server_name'
    ];

     /**
     * Get the links records for the configuration.
     */
    public function links()
    {
        return $this->hasMany('App\Link');
    }
}