<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('back.login');
    }

    public function post(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('/admin/dashboard');
        }
        else 
        {
            return redirect()->back()->with('error', 'Email və ya şifrə yanlışdır');    
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
