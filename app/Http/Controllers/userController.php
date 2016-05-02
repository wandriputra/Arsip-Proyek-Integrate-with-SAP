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
        $this->middleware('admin', ['only' => ['getUserDelete',"getTambahUser","postTambahUser","getListUser","getAjaxListUser","getUserEdit","postUserEdit","getTestPaging","getTestFileRename"]]);        
    }

    public function getLogin()
    {
        if(Auth::user() == false)
        return view('auth.login');
        return redirect('/home');
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
            if(true) {
                // var_dump($user);
                \Session::flash('alert-info', 'User telah diaktifkan');
                return redirect()->back();
            }
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
                $edit_b = '<a href="'.route('edit-user').'/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> ';
                if ($user['status'] === 'A') {
                    $status_b = '<a href="'.route('delete-user').'/'.$user->id.'/A" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i> Nonaktifkan</a>';
                }else{
                    $status_b = '<a href="'.route('delete-user').'/'.$user->id.'/N" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eyes"></i> Aktfikan</a>';
                }
               return $edit_b.$status_b;
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
        $validator = Validator::make($request->all(), array(
            'username' => 'required|between:4,30',
            'password' => 'required|between:4,20|confirmed',
            'password_confirmation' => 'same:password',
            'role_user_id' => 'required',
        ));

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
        $car = date("Y-m-d");
        dd($car);
        $user = User::simplePaginate(3);
        return view('auth.user', compact('user'));
    }

    public function getTestFileRename(Request $request)
    {
        $value = $request->get('val');
        $val = explode('_', $value);
        $c = count($val);
        $no_a = $c - (int)end($val);
        if ($no_a <= 1) {
            $file['no_file'] = preg_replace('/-/', '/', $val[0]);
        }else{
            for ($i=1; $i < $no_a-1 ; $i++) { 
                $val[0] = $val[0].'_'.$val[$i];
            }
            $file['no_file'] = preg_replace('/-/', '/', $val[0]);
        }
        $file['nama_file'] = preg_replace('/\\.[^.\\s]{3,4}$/', '', end($val));
        dd($file);
    }

    public function getUserDelete($value, $status)
    {
        $user = user::find($value);
        if($status == 'N'){
            $user->status = 'A';
            \Session::flash('alert-success', 'User telah dinonaktifkan');
        }elseif($status == 'A'){
            $user->status = 'N';
            \Session::flash('alert-info', 'User telah diaktifkan');
        }
        $user->save();
        return redirect()->back();
    }


}
