<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = ['title','room','floor','area','abbreviated',
        'img','price_doll','price_euro','price_ua','conditions_1','conditions_2','map','vip','view','greeting','size','floors','agent_name','agent_phone',
        'agent_email','agency','address_table','room_table','area_table','living_area_table','kitchen_area_table','floor_table','all_floors_table',
        'layout_table','type_of_building_table','type_of_walls_table','type_of_windows_table','type_of_heating_table',
        'price_table','commission_table','text','type','abroad','city','active'];
    public function images(){
        return $this->hasMany(Image_apartment::class, 'apartment_id');
    }
    public function names(){
        return $this->hasMany(Facilities::class, 'apartment_id');
    }
}
