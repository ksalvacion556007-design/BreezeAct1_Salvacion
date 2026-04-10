<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'amount_paid',      
        'payment_method',
        'payment_status',  
        'payment_date',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
