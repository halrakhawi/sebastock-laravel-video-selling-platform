<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Seller extends Authenticatable
{
    use HasFactory,Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'seller_id';
    protected $fillable = [
        'seller_name',
        'email',
        'password',
        'mobile',
        'store_name',
        'address',
        'account',
        'verification_code',
        'is_verified',
        'picture',
        'accept_reject',
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


    public function getShowImageAttribute()
{
    return url('profile/'. $this->attributes['picture']);
}
public function video()
    {
        return $this->hasMany(Vedio::class,'seller_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class,'seller_id');
    }

    public function payment()
    {
        return $this->belongTo(Payment::class,'seller_id');
    }
    
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','seller_id');
    }
    public function requests(){
        return $this->hasMany(VideoRequested::class,'seller_id','seller_id');
    }
}


