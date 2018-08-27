<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_apartment extends Model
{
    //
    protected $fillable = ['apartment_id','image'];
    protected $hidden = ['apartment_id','created_at','updated_at','id'];

    public function apartments()
    {
        //$this->belongsTo(Apartment::class);
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
