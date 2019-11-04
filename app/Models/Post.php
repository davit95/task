<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *
     */
    public const DEFAULT_IMAGE = 'no-image.jpg';

    /**
     *
     */
    public const POST_IMAGES_PATH = 'images/posts/';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function hasImage()
    {
        return  $this->image !== self::DEFAULT_IMAGE;
    }
}
