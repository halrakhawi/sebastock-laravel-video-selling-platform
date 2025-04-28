<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    use HasFactory;

    protected $fillable=[
           'name',
           'details',
           'url',
           'Videopicture',
           'hashtag',
           'cat_id',
           'price',
           'rating',
           'fivecount',
           'fourcount',
           'threecount',
           'twocount',
           'onecount',
           'views',
           'sales',
           'share',
           'seller_id',
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id');
    }
    public function cat()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function ordervideos(){
        return $this->belongsTo(OrderVideos::class,'video_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'video_id');
    }

    public function offer()
    {
        return $this->hasMany(Offer::class,'video_id');
    }

    public function downloads()
    {
        return $this->belongsTo(UserDownload::class,'video_id');
    }
    public function faviorate()
    {
        return $this->belongsTo(Favorite::class,'video_id');
    }
}
