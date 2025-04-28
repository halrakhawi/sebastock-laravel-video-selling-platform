<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'state',
    ];


    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id');
    }
}
