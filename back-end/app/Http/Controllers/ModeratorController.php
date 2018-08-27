<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\News;
use App\Image_news;
use App\Facilities;
use App\Image_apartment;

class ModeratorController extends Controller
{
    //
    public function event_delete($event){
        News::where('id',$event)->delete();

        return response()->json(null, 204);
    }
    public function apartment_delete($apartment){
        Apartment::where('id',$apartment)->delete();

        return response()->json(null, 204);
    }
    public function new_delete($new){
        News::where('id',$new)->delete();

        return response()->json(null, 204);
    }
    public function image_news_delete($image){
        Image_news::where('id',$image)->delete();

        return response()->json(null, 204);
    }
    public function facility_delete($facility){
        Facilities::where('id',$facility)->delete();

        return response()->json(null, 204);
    }
    public function image_apartment_delete($image){
        Image_apartment::where('id',$image)->delete();

        return response()->json(null, 204);
    }
    public function image_events_delete($image){
        Image_news::where('id',$image)->delete();

        return response()->json(null, 204);
    }
    public function event_update(Request $request, $new){
        //$news = News::all()->where('id', $new)->first();


        $news = News::all()->where('id', $new)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $news->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил событие!',
        ], 201);
    }
    public function new_update(Request $request, $new){
        //$news = News::all()->where('id', $new)->first();


        $news = News::all()->where('id', $new)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $news->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил новость!',
        ], 201);
    }
    public function apartment_update(Request $request, $apartment){
        //$news = News::all()->where('id', $new)->first();


        $apartments = Apartment::all()->where('id', $apartment)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $apartments->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил квартиру!',
        ], 201);
    }
    public function image_news_update(Request $request, $image){
        //$news = News::all()->where('id', $new)->first();


        $images = Image_news::all()->where('id', $image)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $images->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил изображение!',
        ], 201);
    }
    public function image_events_update(Request $request, $image){
        //$news = News::all()->where('id', $new)->first();


        $images = Image_news::all()->where('id', $image)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $images->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил изображение!',
        ], 201);
    }
    public function image_apartments_update(Request $request, $image){
        //$news = News::all()->where('id', $new)->first();


        $images = Image_apartment::all()->where('id', $image)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $images->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил изображение!',
        ], 201);
    }
    public function facilities_update(Request $request, $image){
        //$news = News::all()->where('id', $new)->first();


        $images = Facilities::all()->where('id', $image)->first();
        //dd ($news);
        //return $news;
        //dd($news->images);
        $images->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил удоство!',
        ], 201);
    }
}
