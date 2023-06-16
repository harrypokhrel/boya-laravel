<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_name',
        'parent_cat_id',
        'image',
        'status'
    ];

    public function activity(){
        return $this->hasMany('App\Models\Activity'); // assuming this is the path for activity model
    }
}
