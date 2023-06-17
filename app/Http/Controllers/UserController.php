<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        $auth = DB::table('nurse_auth')
            ->where('login', $request->login)
            ->where('password', md5(md5($request->password)))
            ->first();
        if (empty($auth)){
//            dd($request);
            return back()->with('login_error', 1);
        }
        session()->put('userAuth', '1');
        return redirect(route('get_nurses'));
    }

    public function user_logout(){
        return redirect(route('get_nurses'));
    }

}
