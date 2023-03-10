<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
        'is_verified'
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    public function histories(){
        return $this->hasMany(History::class, 'user_id', 'id');
    }
    public function transactions(){
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
}
