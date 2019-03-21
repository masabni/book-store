<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'sub_category_id', 'author_id', 'publisher_id', 'author_role_id', 'name',
        'publisher_role_id', 'product_type_id', 'cover_type_id', 'product_size_id', 'image', 'selling_price', 'cost_price',
        'product_weight', 'num_pages', 'isbn', 'barcode', 'edition', 'release_date', 'pdf_link', 'audio_file', 'description'
    ];

    protected $dates = [
         'created_at', 'updated_at'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function author_role()
    {
        return $this->belongsTo('App\Models\AuthorRole');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function cover_type()
    {
        return $this->belongsTo('App\Models\CoverType');
    }

    public function product_size()
    {
        return $this->belongsTo('App\Models\ProductSize');
    }

    public function product_type()
    {
        return $this->belongsTo('App\Models\ProductType');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }

    public function publisher_role()
    {
        return $this->belongsTo('App\Models\PublisherRole');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
}
