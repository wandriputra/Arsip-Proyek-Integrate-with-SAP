<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

use App\Models\User as user;
use App\Models\Personil as Personil;
use App\Models\Role_user as Role;

use Validator;
use Hash;
use Auth;
use Datatables;

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
        return view('auth.login');
    }

    public function getLogout()
    {
        $this->auth->logout(); 
        return redirect('auth/login');
    }

    public function getRegister()
    {
        return view('auth.register');
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

    public function getTambahUser($value='')
    {
        $personil = Personil::all();
        $role_user = Role::all();
        return view('auth.tambah', compact('personil', 'role_user'));
    }

    public function postTambahUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|between:5,30',
            'password' => 'required|between:4,20|confirmed',
            'password_confirmation' => 'same:password',
            'role_user_id' => 'required',
        ]);

        $request['created_by'] = Auth::user()->id;
        $request['password'] = bcrypt($request['password_confirmation']);

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }
        $input = $request->only(['username', 'password', 'role_user_id', 'status', 'personil_id', 'created_by']);
        user::create($input);
        return redirect('auth/list-user');
    }

    public function getListUser($value='')
    {
        
        return view('auth.list-user');
    }

    public function getAjaxListUser()
    {
        $user = User::all();
        return Datatables::of($user)
            ->addColumn('email', function($user){
                return $user['personil']['email'];
            })
            ->addColumn('nama_personil', function($user){
                return $user['personil']['nama_personil'];
            })
            ->addColumn('created_by', function($user){
                return $user['user']['username'];
            })
            ->addColumn('action', function($user){
               return '<a href="'.route('edit-user').'/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    public function getProfil($value='')
    {
        return view('auth.profil');
    }

    public function getUserEdit($value='')
    {
        $user = user::where('id', $value)->firstOrFail();
        $personil = Personil::all();
        $role_user = Role::all();
        $url = 'auth/user-edit';
        return view('auth.tambah', compact('user', 'personil', 'role_user', 'url'));
    }

    public function postUserEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|between:5,30',
            'password' => 'required|between:4,20|confirmed',
            'password_confirmation' => 'same:password',
            'role_user_id' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }
        $edit = $request->all();

        $user = user::find($request['id']);
        $user->username = $edit['username'];
        $user->password = bcrypt($edit['password']);
        $user->status = $edit['status'];
        $user->role_user_id = $edit['role_user_id'];
        $user->created_by = Auth::user()->id;
        $user->personil_id = $edit['personil_id'];
        $user->save();
        return redirect('auth/list-user');
    }

    public function getTestPaging($value='')
    {
        $user = User::simplePaginate(3);
        return view('auth.user', compact('user'));
    }


}
