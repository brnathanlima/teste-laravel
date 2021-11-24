<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['profile'];

    public function profile()
    {
        return $this->morphTo();
    }

    public function setPhoneNumbersAttribute($phone_numbers)
    {
        $phone_numbers = array_map(function ($phone_number) {
            return (empty($phone_number)) ? '' : $phone_number;
        }, $phone_numbers);

        $this->attributes['phone_numbers'] = json_encode($phone_numbers);
    }

    public function getHasPhysicalPersonProfileAttribute()
    {
        return $this->profile_type == 'App\Models\PhysicalPersonProfile';
    }

    public function getHasLegalPersonProfileAttribute()
    {
        return $this->profile_type == 'App\Models\LegalPersonProfile';
    }
}
