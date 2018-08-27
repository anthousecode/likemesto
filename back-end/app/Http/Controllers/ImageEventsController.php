<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image_news;
use App\User;

class ImageEventsController extends Controller
{
    //
    public function story(Request $request){
        $user = User::where('id',\Auth::id())->first();
        if($user->verify != 1)
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не может добавить новость, поскольку он не подтвердил свой аккаунт на почте!',
            ], 201);

        $new = new Image_news();
        $new->image=$request->get('image');

        $new->new_id=$request->get('new_id');
        $new->save();



        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил картинку для события!',
        ], 201);
    }
    public function update(Request $request, $image){
        $images = Image_news::all()->where('id', $image)->first();
        //dd($images->news->user_id);
        if($images->news->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        $images->update($request->all());
//
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' обновил изображение',
        ], 201);
    }
    public function delete($image){
        $images = Image_news::all()->where('id', $image)->first();



        if($images->news->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        Image_news::where('id',$images)->delete();

        return response()->json(null, 204);
    }
}
