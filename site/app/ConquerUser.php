<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class ConquerUser extends \TCG\Voyager\Models\User
{
    use Notifiable;

    protected $table = "account";
    protected $connection = 'conquer_mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
