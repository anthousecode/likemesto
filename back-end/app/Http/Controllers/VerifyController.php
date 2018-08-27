<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
    //
    /**
     * Verify the user with a given token.
     * @param string $token
     * @return Response
     *
     */
    public function verify($token){
//       User::where('token', $token)->firstOrFail()
//       ->update(array([
//                ['token' => null],
//                ['verify' => '1'],
//       ])); //verify the user
        User::where('token', $token)->firstOrFail()
            ->update([
            'token' => null,
            'verify' => '1',

        ]);
       return redirect()
           ->route('home')
           ->with('success','Account verified!');
    }
}
