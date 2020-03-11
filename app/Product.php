<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
        'url', 'title', 'content','sort',
    ];

    public function Product_IMG()
    {
        return $this->hasMany('App\Product_IMG');
    }

}
