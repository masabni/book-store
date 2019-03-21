<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorRole extends Model
{
    protected $fillable = ['role'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
