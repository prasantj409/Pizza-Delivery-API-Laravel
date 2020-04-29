<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fname', 'lname', 'phone','email','address1','city','state','zip'
    ];

    public function Order()
    {
        return $this->hasOne('App\Order');
    }
}
