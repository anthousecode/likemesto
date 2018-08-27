<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Facilities;
use App\Image_apartment;

class KharkovLeaseController extends Controller
{
    //
    public function index(){
        return Apartment::select('id','title','room','floor','area','abbreviated','img','price_doll','price_euro','price_ua','conditions_1','conditions_2','map','vip')->where([
            ['type', '=', 'lease'],
            ['abroad', '=', '0'],
            ['city','=','kharkov']
        ])->get();
    }
    public function show($lease){
        $apartment=Apartment::select(['id','view','greeting','size','floors','agent_name','agent_phone','agent_email','agency','address_table','room_table','area_table','living_area_table','kitchen_area_table','floor_table','all_floors_table','layout_table','type_of_building_table','type_of_walls_table','type_of_windows_table','type_of_heating_table','price_table','commission_table','text'])->where([
            ['id','=',$lease],
            ['city','=','kharkov'],
            ['type','=','lease'],
            ['abroad','=','0']
        ])->with('images','names')->get();
//        $news = News::with('images:id')->paginate(5);
//        $news = News::with(['images' => function($q) {
        //    $q->select('id', 'image')->get();
        // }])->get();



        return $apartment;
    }
}
