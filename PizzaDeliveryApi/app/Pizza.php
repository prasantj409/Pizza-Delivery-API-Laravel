<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'price'];

    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }
}
