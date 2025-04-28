<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'sender_id',
        'reciever_id',
        'body',
        'unread',
        'usertype'//0:admin , 1:seller , 2:buyer
    ];


    public function sender(){
        return $this->belongsTo(Seller::class,'sender_id');
    }
}

