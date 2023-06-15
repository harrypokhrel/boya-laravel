<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'booking_id',
        'activity_name',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'date',
        'time',
        'No_of_tickets',
        'sub_total',
        'total',
        'payment_method',
        'status',
        'note',
        'payment_note',
        'image'

    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function activity()
    {
        return $this->hasMAny(Activity::class);
    }
}
