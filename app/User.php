<?php

namespace App;

use App\Balance;
use App\Historie;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function historie()
    {
        return $this->hasMany(Historie::class);
    }

    public function getSender($sender)
    {
        return User::where('name', 'like', $sender)
            ->orWhere('email', $sender)
            ->first();
    }

}
