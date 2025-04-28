<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id',
        'offerPrice',
        'startdate',
        'enddate',
    ];

    public function videos(){
        return $this->belongsTo(Vedio::class,'video_id');
    }
}
