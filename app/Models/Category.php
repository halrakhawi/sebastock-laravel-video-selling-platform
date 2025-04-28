<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Category extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $fillable = [
        'name',
        'picture',
        'active',
        'cat_id',
        'created_at',
        'updated_at',
    ];
    /* Get all of the videos for the Category
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
  


    public function scopActive($query){
        return $query->where('active',1);
    }

    public function scopeSelection($query){
        return $query->select('name','picture','active');
    }

    public function video()
    {
        return $this->hasMany(Vedio::class,'cat_id');
    }   
}
