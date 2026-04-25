<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_image',
        'product_price',
        'product_description',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('product_name', 'LIKE', "%{$term}%");
    }

    public function scopePriceRange($query, $min, $max)
    {
        if ($min) {
            $query->where('product_price', '>=', $min);
        }
        if ($max) {
            $query->where('product_price', '<=', $max);
        }
        return $query;
    }
   
}