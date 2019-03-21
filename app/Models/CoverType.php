<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverType extends Model
{
    protected $fillable = ['type'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
