<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id','roles','token','verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function verified(){
        return $this->token === null;
    }

    public function sendVerificationEmail(){
        $this->notify(new VerifyEmail($this));
    }

    public function addNew($input)

    {

        $check = static::where('google_id',$input['google_id'])->first();



        if(is_null($check)){

            return static::create($input);

        }



        return $check;

    }
}
