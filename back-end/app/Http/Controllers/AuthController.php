<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Apartment;
use App\Image_apartment;
use App\Facilities;
use App\News;
use App\Image_news;


class AuthController extends Controller
{
    //
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles' => '0',
            'verify' => '0',
            'token' => str_random(25),

        ]);
        $user->save();
        $user->sendVerificationEmail();
//        return $user;
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function moderator($user){
        //$users = User::where('id',\Auth::id())->first();
//        if($users->roles != '1')
//            return response()->json([
//                'message' => 'У вас нет прав, поскольку вы не администратор'
//            ]);
        //$moderator = User::where(['id','=',$user])->get();
        $moderator = User::all()->where('id',$user )->first();
        $moderator->update([
            'roles' => '2'

        ]);
        return response()->json([
            'message' => 'Вы добавили модератора'
        ], 201);



    }
    public function unmoderator($user){
        //$users = User::where('id',\Auth::id())->first();
//        if($users->roles != '1')
//            return response()->json([
//                'message' => 'У вас нет прав, поскольку вы не администратор'
//            ]);
        //$moderator = User::where(['id','=',$user])->get();
        $moderator = User::all()->where('id',$user )->first();
        $moderator->update([
            'roles' => '0'

        ]);
        return response()->json([
            'message' => 'Вы удалили модератора'
        ], 201);



    }
    public function apartment_post(Request $request){
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
    public function apartment_get($apartment){
        $apartments=Apartment::select(['id','view','greeting','size','floors','agent_name','agent_phone','agent_email','agency','address_table','room_table','area_table','living_area_table','kitchen_area_table','floor_table','all_floors_table','layout_table','type_of_building_table','type_of_walls_table','type_of_windows_table','type_of_heating_table','price_table','commission_table','text'])->where([
            ['id','=',$apartment],
            ['type','=','sale'],
            ['abroad','=','0']])->with('images','names')->get();
//        $news = News::with('images:id')->paginate(5);
//        $news = News::with(['images' => function($q) {
        //    $q->select('id', 'image')->get();
        // }])->get();



        return $apartments;

    }
    public function apartment(){
        return Apartment::select('id','title','room','floor','area','abbreviated','img','price_doll','price_euro','price_ua','conditions_1','conditions_2','map','vip')->where([
            ['type', '=', 'sale'],
            ['abroad', '=', '0']
        ])->get();

    }
    public function apartment_put(Request $request, $apartment){
        $apartments = Apartment::all()->where('id', $apartment)->first();
        $apartments->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил квартиру!',
        ], 201);
    }
    public function apartment_delete($apartment){

        Apartment::where('id',$apartment)->delete();

        return response()->json(null, 204);
    }
    public function new_post(Request $request)
    {
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

    public function new_get($new){
        $news=News::select(['id','title','text'])->where([
            ['id','=',$new],
            ['type','=','events']])->with('images')->get();
//
        return $news;
    }
    public function new(){
        $new = News::select(['id','title','abreviated','picture'])->where([
            ['type','=','events']

        ])->get();

        return $new;
    }
    public function new_put(Request $request, $new){
        //$news = News::all()->where('id', $new)->first();

        $news = News::all()->where('id', $new)->first();
        //return $news;
        //dd($news->images);
        $news->update($request->all());
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' изменил новость!',
        ], 201);
    }
    public function new_delete($new){
       News::where('id',$new)->delete();

        return response()->json(null, 204);

    }
    public function event_post(Request $request)
    {
        $news = new News();
        $news->title=$request->get('title');
        $news->abreviated=$request->get('abreviated');
        $news->picture=$request->get('picture');
        $news->text=$request->get('text');
        $news->type='events';
        $news->user_id=\Auth::id();
        $news->active='1';
        $news->save();


        foreach ($request->image as $image) {
            $img = Image_news::create(['image' => $image]);
            $news->images()->save($img);
//         dd($img);

        }
        return response()->json([
            'message' => 'Пользователь '. \Auth::user()->name .' добавил событие!',
        ], 201);
    }

    public function event_get($event){
        $news=News::select(['id','title','text'])->where([
            ['id','=',$event],
            ['type','=','events']])->with('images')->get();
//
        return $news;

    }
    public function event(){
        $new = News::select(['id','title','abreviated','picture'])->where([
            ['type','=','events']

        ])->get();

        return $new;

    }
    public function event_put(Request $request, $new){
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
    public function event_delete($event){
        News::where('id',$event)->delete();

        return response()->json(null, 204);
    }
    public function events_active($event){
        $active = News::all()->where('id',$event )->first();
        $active->update([
            'active' => '1'

        ]);
        return response()->json([
            'message' => 'Вы активировали событие'
        ], 201);
    }
    public function news_active($new){
        $active = News::all()->where('id',$new )->first();
        $active->update([
            'active' => '1'

        ]);
        return response()->json([
            'message' => 'Вы активировали новость'
        ], 201);
    }
    public function apartment_active($apartment){
        $active = Apartment::all()->where('id',$apartment )->first();
        $active->update([
            'active' => '1'

        ]);
        return response()->json([
            'message' => 'Вы активировали квартиру'
        ], 201);
    }
    public function events_deactive($event){
        $active = News::all()->where('id',$event )->first();
        $active->update([
            'active' => '0'

        ]);
        return response()->json([
            'message' => 'Вы деактивировали новость'
        ], 201);
    }
    public function news_deactive($new){
        $active = News::all()->where('id',$new )->first();
        $active->update([
            'active' => '0'

        ]);
        return response()->json([
            'message' => 'Вы деактивировали новость'
        ], 201);
    }
    public function apartment_deactive($apartment){
        $active = Apartment::all()->where('id',$apartment )->first();
        $active->update([
            'active' => '0'

        ]);
        return response()->json([
            'message' => 'Вы деактивировали новость'
        ], 201);
    }
    public function update_user(Request $request){

//        $users = User::all()->where('id',\Auth::id() )->first();
//
//        $users->update($request->all());
//        return response()->json([
//            'message' => 'Пользователь '. \Auth::user()->name .' изменил данные!',
//        ], 201);

        if($request->email){

            $request->validate([

                'email' => 'required|string|email|unique:users'

            ]);
            $users = User::all()->where('id',\Auth::id() )->first();
            $users->update([
                'email' => $request->email

            ]);
        }
        if($request->password){

//            $request->validate([
//
//                'password' => 'required|string|confirmed'
//
//            ]);
            $users = User::all()->where('id',\Auth::id() )->first();
            $users->update([
                'password' => bcrypt($request->password)

            ]);
        }
        if($request->name){

            $users = User::all()->where('id',\Auth::id() )->first();
            $users->update([
                'name' => $request->name

            ]);
        }

//        $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|confirmed'
//        ]);
//        $user = new User([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password)
//        ]);
//        $user->save();
        return response()->json([
            'message' => 'Successfully updated user!'
        ], 201);
    }

}
