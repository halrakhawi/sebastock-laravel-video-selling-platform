<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table='subcategory';

    protected $fillable = [
        'name',
        'picture',
        'active',
        'cat_Id',
        'created_at',
        'updated_at',
    ];
}
