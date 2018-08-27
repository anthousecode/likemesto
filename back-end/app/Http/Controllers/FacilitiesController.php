<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facilities;
use App\User;

class FacilitiesController extends Controller
{
    //
    public function story(Request $request){
        $user = User::where('id',\Auth::id())->first();
        if($user->verify != 1)
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не может добавить новость, поскольку он не подтвердил свой аккаунт на почте!',
            ], 201);

        $facilities = new Facilities();
        $facilities->name=$request->get('title');

        $facilities->apartment_id=$request->get('apartment_id');
        $facilities->save();



        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил удобство!',
        ], 201);
    }
    public function update(Request $request, $facility)
    {
        $facilities = Facilities::all()->where('id', $facility)->first();
        //dd($images->news->user_id);
        if($facilities->apartment->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        $facilities->update($request->all());
//
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' обновил удобство для квартиры',
        ], 201);
    }
    public function delete($facility){
        $facilities = Facilities::all()->where('id', $facility)->first();



        if($facilities->apartment->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        Apartment::where('id',$facility)->delete();

        return response()->json(null, 204);
    }

}
