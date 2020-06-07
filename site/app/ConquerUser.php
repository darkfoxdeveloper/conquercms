<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class ConquerUser extends \TCG\Voyager\Models\User
{
    use Notifiable;

    protected $table = "accounts";
    protected $connection = 'conquer_mysql';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'question', 'answer', 'mobilenumber', 'secretquestion'
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
