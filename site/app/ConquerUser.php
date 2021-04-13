<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class ConquerUser extends \TCG\Voyager\Models\User
{
    use Notifiable;

    protected $table = "accounts";
    protected $connection = 'conquer_mysql_accserver';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

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

    public function __construct(array $attributes = [])
    {
        $this->table = env("CONQUER_DB_TABLE_ACCOUNTS", "accounts");
        parent::__construct($attributes);
    }
}
