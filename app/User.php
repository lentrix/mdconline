<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public static $scopes = [
        'CAST'      => ['BSIT','BSCS','BSIS'],
        'CABM-B'    => ['BSBA-MM','BSBA-FM','BSA','BSC-MA'],
        'CABM-H'    => ['BSHRM','BSTM','BSHM'],
        'CCJ'       => ['BSCrim'],
        'COE'       => ['BEED','BSED-Fil','BSED-Val','BSED-Math','BSED-Soc','BSED-Eng','BSED-Sci'],
        'CON'       => ['BSN']
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password', 'username', 'fullname', 'designation', 'scope'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function scopes() {
        return static::$scopes;
    }
}
