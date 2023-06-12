<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "company";
    protected $fillable = [
        'user_id',
        'title',
        'comission_percentage',
        'contact_number',
        'email',
        'website',
        'country',
        'city',
        'shift',
        'shift_timing',
        'cancel_policy',
        'terms_condition'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User'); // assuming this is the path for user model
    }

    public function activity(){
        return $this->hasMany('App\Models\Activity'); // assuming this is the path for activity model
    }
}
