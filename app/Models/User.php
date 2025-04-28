<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'address',
        'picture',
        'verification_code',
        'is_verified',
        'accept_reject_request'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders(){
        return $this->hasMany(Order::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','id');
    }

    public function downloads(){
        return $this->hasMany(UserDownloads::class,'user_id');
    }

}
