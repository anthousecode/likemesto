<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    //
    protected $fillable = ['apartment_id','name'];
    protected $hidden = ['id','apartment_id','created_at','updated_at'];
    public function apartment()
    {
        //$this->belongsTo(Apartment::class);
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
