<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'checkout_items';

    // The primary key of this table
    protected $primaryKey = 'checkout_item_id';

    // Disable timestamps if the table does not have created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'checkout_id',
        'product_id',
        'quantity',
        'duration_days',
        'price_per_day',
        'total_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'checkout_id', 'checkout_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}