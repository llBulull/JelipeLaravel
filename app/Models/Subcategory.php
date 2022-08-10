<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded =['id', 'created_at', 'updated_at'];
    //one to many
    public function products(){
        return $this->hasMany(Product::class);
    }
    
    //one to many
    public function category(){
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
