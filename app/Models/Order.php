<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'checkout';

    // The primary key of the checkout table
    protected $primaryKey = 'checkout_id';

    // Disable timestamps because the table does not have created_at/updated_at
    public $timestamps = false;

    protected $fillable = ['id', 'total_amount']; // 'id' is the user id in this table

    // Relationship: an order belongs to a user (foreign key is 'id')
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relationship: an order has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'checkout_id', 'checkout_id');
    }

    // Scope: filter by date range (using checkout_id as a rough date proxy, or we can ignore dates)
    // Since there is no date column, we simply don't filter by date, or we can order by checkout_id
    public function scopeDateRange($query, $from, $to)
    {
        // The table has no date fields, so this filter will be ignored.
        // You can remove the date inputs from the purchase-history view later if needed.
        return $query;
    }
}