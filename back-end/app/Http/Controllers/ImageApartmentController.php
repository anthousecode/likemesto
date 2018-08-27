<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image_apartment;
use App\User;

class ImageApartmentController extends Controller
{
    //
    public function story(Request $request){
        $user = User::where('id',\Auth::id())->first();
        if($user->verify != 1)
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не может добавить новость, поскольку он не подтвердил свой аккаунт на почте!',
            ], 201);

        $image = new Image_apartment();
        $image->image=$request->get('image');

        $image->apartment_id=$request->get('apartment_id');
        $image->save();



        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил картинку для квартиры!',
        ], 201);
    }
    public function update(Request $request, $image){
        $images = Image_apartment::all()->where('id', $image)->first();
        //dd($images->news->user_id);
        if($images->apartments->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        $images->update($request->all());
//
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' обновил изображение для квартиры',
        ], 201);
    }
    public function delete($image){
        $images = Image_apartment::all()->where('id', $image)->first();



        if($images->apartments->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        Image_apartment::where('id',$images)->delete();

        return response()->json(null, 204);
    }
}
