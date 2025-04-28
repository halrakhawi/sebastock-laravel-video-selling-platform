<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table='favorites';
    protected $fillable = ['id','video_id','user_id'];

    public function video(){
      
            return $this->belongsTo(Vedio::class,'video_id');
        }

        public function User(){
      
            return $this->belongsTo(User::class, 'user_id');
        }
}
