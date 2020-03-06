<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';

    protected $fillable = [
        'url', 'title', 'content','sort',
    ];


    public function News_IMG()
    {
        return $this->hasMany('App\News_IMG');
    }

}

