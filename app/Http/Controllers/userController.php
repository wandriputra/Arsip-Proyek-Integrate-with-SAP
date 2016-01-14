<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

use App\model\user;

use Validator;
use Hash;
use Auth;

class userController extends Controller
{
    protected $auth;
    
    function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth', ['except' => ['getLogin', 'postLogin', 'getRegister', 'postRegister']]);        
    }

    public function getLogin()
    {
        return view('login');
    }

    public function getLogout()
    {
        $this->auth->logout(); 
        return redirect('/login');
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $attempt = $this->auth->attempt($request->except('_token', 'remember'), false);
        if ($attempt){
            $user = user::where('username',$request['username'])->firstOrFail();
            if($user->status === 'N') 
                return redirect()->back()->withMessages('Tidak Bisa Login. Status User Nonaktif.');
        }   
        return ($attempt) ? redirect('/home') : redirect()->back()->withErrors('Gagal masuk!');
    }


}
