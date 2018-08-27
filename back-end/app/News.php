<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = ['id','title','text','abreviated','picture','type','user_id','active','type'];
    public function images(){
        return $this->hasMany(Image_news::class, 'new_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
