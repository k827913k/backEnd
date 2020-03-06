<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $news_id
 * @property string $url
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class News_IMG extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'News_IMG';

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
