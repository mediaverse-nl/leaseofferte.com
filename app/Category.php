<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['*'];

    public function categories()
    {
        return $this->hasMany('App\Category','category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id', 'id');
    }
}
