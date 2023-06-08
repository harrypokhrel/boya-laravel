<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = "gallery";
    protected $fillable = [
        'activity_id',
        'image_name',
        'image_order'
    ];

    public function activity(){
        return $this->belongsTo('App\Models\Activity'); // assuming this is the path for user model
    }
}
