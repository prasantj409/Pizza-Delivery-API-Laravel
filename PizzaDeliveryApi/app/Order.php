<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id'
    ];

    public function Pizza()
    {
        return $this->belongsToMany(Pizza::class)->withPivot('quantity', 'total_price');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
