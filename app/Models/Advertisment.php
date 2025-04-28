<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;
    protected $table='advertisments';

    protected $fillable = [
        'url',
        'title',
        'type',
        'status',
        'created_at',
        'updated_at',
    ];
    
}
