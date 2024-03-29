<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function sub_category()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
}
