<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['video_id', 'cart_id', 'quantity'];
    public $incrementing = false;
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function video()
    {
        return $this->hasOne(Vedio::class);
    }
}
