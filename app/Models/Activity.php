<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = "activities";
    protected $fillable = [
        'vendor_id',
        'commission_percentage',
        'title',
        'show_in_homepage',
        'age_group',
        'duration',
        'price_weekday',
        'price_weekend',
        'country',
        'city',
        'location',
        'latitude',
        'longitude',
        'tickets_per_time_slot',
        'opening_hour',
        'closing_hour',
        'description',
        'highlights',
        'inclusions',
        'cancel_policy',
        'category',
        'featured_image',
        'approved',
        'status',
        'rejection_message',
        'last_edited',
        'added_on',
        'added_by'
    ];
}