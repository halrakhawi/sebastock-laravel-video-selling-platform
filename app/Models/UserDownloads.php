<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDownloads extends Model
{
    use HasFactory;
    protected $fillable=[
        'video_id',
        'user_id',
 ];
 public function user()
 {
     return $this->belongsTo(User::class,'id');
 }

 public function Video()
 {
     return $this->belongsTo(Vedio::class,'id');
 }
}
