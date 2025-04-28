<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoAccepted extends Model
{
    use HasFactory;
    protected $fillable=[
        'video_id',
        'seller_id',
 ];
 public function seller()
 {
     return $this->belongsTo(Seller::class,'seller_id');
 }

 public function Video()
 {
     return $this->belongsTo(Vedio::class);
 }
}
