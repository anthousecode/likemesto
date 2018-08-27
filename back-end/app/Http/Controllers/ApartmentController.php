<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Image_apartment;
use App\Facilities;
use App\User;

class ApartmentController extends Controller
{
    //
    public function story(Request $request){
        $user = User::where('id',\Auth::id())->first();
        if($user->verify != 1)
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не может добавить новость, поскольку он не подтвердил свой аккаунт на почте!',
            ], 201);
        $apartments = new Apartment();
        $apartments->title=$request->get('title');
        $apartments->room=$request->get('room');
        $apartments->floor=$request->get('floor');
        $apartments->area=$request->get('area');
        $apartments->abbreviated=$request->get('abbreviated');
        $apartments->img=$request->get('img');
        $apartments->price_doll=$request->get('price_doll');
        $apartments->price_euro=$request->get('price_euro');
        $apartments->price_ua=$request->get('price_ua');
        $apartments->conditions_1=$request->get('conditions_1');
        $apartments->conditions_2=$request->get('conditions_2');
        $apartments->map=$request->get('map');
        $apartments->vip=$request->get('vip');
        $apartments->view=$request->get('view');
        $apartments->greeting=$request->get('greeting');
        $apartments->size=$request->get('size');
        $apartments->floors=$request->get('floors');
        $apartments->agent_name=$request->get('agent_name');
        $apartments->agent_phone=$request->get('agent_phone');
        $apartments->agent_email=$request->get('agent_email');
        $apartments->agency=$request->get('agency');
        $apartments->address_table=$request->get('address_table');
        $apartments->room_table=$request->get('room_table');
        $apartments->area_table=$request->get('area_table');
        $apartments->living_area_table=$request->get('living_area_table');
        $apartments->kitchen_area_table=$request->get('kitchen_area_table');
        $apartments->floor_table=$request->get('floor_table');
        $apartments->all_floors_table=$request->get('all_floors_table');
        $apartments->layout_table=$request->get('layout_table');
        $apartments->type_of_building_table=$request->get('type_of_building_table');
        $apartments->type_of_walls_table=$request->get('type_of_walls_table');
        $apartments->type_of_windows_table=$request->get('type_of_windows_table');
        $apartments->type_of_heating_table=$request->get('type_of_heating_table');
        $apartments->price_table=$request->get('price_table');
        $apartments->commission_table=$request->get('commission_table');
        $apartments->text=$request->get('text');
        $apartments->type=$request->get('type');
        $apartments->abroad=$request->get('abroad');
        $apartments->city=$request->get('city');
        $apartments->active='1';
        $apartments->user_id=\Auth::id();
        $apartments->save();


        foreach ($request->image as $image) {
            $img = Image_apartment::create(['image' => $image]);
            $apartments->images()->save($img);
//         dd($img);

        }
        foreach ($request->name as $name) {
            $nam = Facilities::create(['name' => $name ]);
            $apartments->names()->save($nam);
            // dd($img);

        }
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил квартиру!',
        ], 201);
    }
    public function update(Request $request, $apartment){


            //dd($news);
            $apartments = Apartment::all()->where('id', $apartment)->first();



            if($apartments->user_id != \Auth::id())
                return response()->json([
                    'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
                ], 201);
//




            //$apartments = Apartment::all()->where('id', $apartment)->first();
            //return $news;
            //dd($news->images);
            $apartments->update($request->all());
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' изменил квартиру!',
            ], 201);

        }
    public function delete($apartment){
        $apartments = Apartment::all()->where('id', $apartment)->first();



        if($apartments->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        Apartment::where('id',$apartment)->delete();

        return response()->json(null, 204);
    }


}
