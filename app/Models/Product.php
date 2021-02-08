<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producer;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

public function producer(){
    return $this->belongsTo(Producer::class);
}

public function category(){
    return $this->belongsTo(Category::class);
}

protected $fillable = [
    'name',
    'price',
    'size',
    'producer_id',
    'category_id'
    
];

}
