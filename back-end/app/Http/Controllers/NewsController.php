<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Image_news;
use App\User;

class NewsController extends Controller
{
    //
    public function index(){
        return News::select(['id','title','abreviated','picture'])->where([
            ['type','=','news']
        ])->get();
    }
    public function show($new){
        $news=News::select(['id','title','text'])->where([
            ['id','=',$new],
            ['type','=','news']])->with('images')->get();
//        $news = News::with('images:id')->paginate(5);
//        $news = News::with(['images' => function($q) {
        //    $q->select('id', 'image')->get();
        // }])->get();

        return $news;
    }
    public function story(Request $request){
        $user = User::where('id',\Auth::id())->first();
        if($user->verify != 1)
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не может добавить новость, поскольку он не подтвердил свой аккаунт на почте!',
            ], 201);
        $news = new News();
        $news->title=$request->get('title');
        $news->abreviated=$request->get('abreviated');
        $news->picture=$request->get('picture');
        $news->text=$request->get('text');
        $news->type='news';
        $news->user_id=\Auth::id();
        $news->active='1';
        $news->save();


        foreach ($request->image as $image) {
            $img = Image_news::create(['image' => $image]);
            $news->images()->save($img);
//         dd($img);

        }
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил новость!',
        ], 201);
    }
    public function update(Request $request, $new){

        $news = News::all()->where('id', $new)->first();



        if($news->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);
//




        $news = News::all()->where('id', $new)->first();
        //return $news;
        //dd($news->images);
        $news->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил новость!',
        ], 201);
    }
    public function delete($new){
        $news = News::all()->where('id', $new)->first();



        if($news->user_id != \Auth::id())
            return response()->json([
                'message' => 'Пользователь '. \Auth::user()->name .' не подтвержден!',
            ], 201);

        News::where('id',$new)->delete();

        return response()->json(null, 204);
    }
}
