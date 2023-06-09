<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = "activities";
    protected $fillable = [
        'company_id',
        'title',
        'location',
        'latitude',
        'longitude',
        'tag',
        'category',
        'featured_image',
        'description',
        'highlights',
        'inclusions',
        'age_group',
        'show_in_homepage',
        'duration',
        'price_weekday',
        'price_weekend',
        'enable_shift_price',
        'shift_discount_type',
        'shift_on_weekends',
        'opening_hour',
        'shift_price',
        'tickets_per_time_slot',
        'opening_hour',
        'closing_hour',
        'approved',
        'status',
        'rejection_message',
        'added_on',
        'added_by'
    ];

    public function gallery(){
        return $this->hasMany('App\Models\Gallery'); // assuming this is the path for company model
    }
}