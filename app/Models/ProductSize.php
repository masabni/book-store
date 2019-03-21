<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = ['size'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
