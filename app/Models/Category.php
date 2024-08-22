<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'id_category',
        'name',
    ];
    protected $primaryKey = 'id_category';
    public function products(){
        return $this->hasMany(Product::class, 'id_category', 'id_category');
    }
}
