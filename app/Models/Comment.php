<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id',
        'user_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
     public function adminuser(){
        return $this->belongsTo(Admin::class,'user_id');
    }
     public function selleruser(){
        return $this->belongsTo(Seller::class,'user_id');
    }
    public function video(){
        return $this->belongsTo(Vedio::class);
    }
}
