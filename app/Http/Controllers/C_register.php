<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class C_register extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('guest');
    }
    
    public function create()
    {
        $data = ['name' => ''];
        return view('login.formRegister',$data);
    }

    public function store()
    {
        // $this->validate(request(), [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        
        // var_dump(request());
        // return view('login.formLogin',$data);
        
        $user = User::create(request(['NIP','name','email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->to('/');
        } else {
          return $credentials;
        }
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect()->to('/');
    }

  }
