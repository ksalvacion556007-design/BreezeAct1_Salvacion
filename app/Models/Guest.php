<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'full_name',        
        'email',
        'contact_number',  
        'address',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
