<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVideos extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'video_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function videos(){
        return $this->hasMany(Vedio::class,'video_id');
    }
}
