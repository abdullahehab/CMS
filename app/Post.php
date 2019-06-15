<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = ['category_id', 'title', 'description', 'featured', 'slug'];

    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
