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
        'title',
        'country',
        'city',
        'location',
        'latitude',
        'longitude',
        'category',
        'sub_category',
        'featured_image',
        'description',
        'highlights',
        'inclusions',
        'cancel_policy',
        'age_group',
        'show_in_homepage',
        'duration',
        'commission_percentage',
        'price_weekday',
        'price_weekend',
        'tickets_per_time_slot',
        'opening_hour',
        'closing_hour',
        'approved',
        'status',
        'rejection_message',
        'last_edited',
        'added_on',
        'added_by'
    ];
}