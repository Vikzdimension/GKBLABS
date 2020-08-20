<?php

namespace GKBLAB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Employee as Authenticatable;

class Employee extends Model
{
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'hobbies', 'gender', 'picture'
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];
    
    // public function setHobbiesAttribute($value)
    // {
    //     return json_encode($value);
    // }

    // public function getHobbiesAttribute($value)
    // {
    //     return json_decode($value, true);
    // }

}
