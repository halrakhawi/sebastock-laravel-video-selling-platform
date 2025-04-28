<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoRequested extends Model
{
    use HasFactory;
    protected $table='video_requests';
    protected $fillable=[
        'video_id',
        'seller_id',
 ];
 public function seller()
 {
     return $this->belongsTo(Seller::class,'seller_id','seller_id');
 }

 public function video()
 {
     return $this->belongsTo(Vedio::class);
 }
}
