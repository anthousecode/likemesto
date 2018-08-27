<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_news extends Model
{
    //
    protected $fillable = ['image','new_id'];
    protected $hidden = ['created_at','updated_at'];

    public function news()
    {
        return $this->belongsTo(News::class, 'new_id', 'id');
    }
}
