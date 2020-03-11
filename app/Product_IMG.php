<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_IMG extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_img';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['news_id', 'url', 'sort', 'created_at', 'updated_at'];

}
