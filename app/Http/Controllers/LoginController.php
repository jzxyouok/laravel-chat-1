<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Auth;
use Hash;
use Session;
use Cookie;
use Socialite;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {

    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        setcookie('username_login','',time()-3600,'/');
        return Redirect::route('login');
    }

    public function auth(Request $request) 
    {

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|min:1'
            );

        $validator = Validator::make($request->all(), $rules);
        $remember_me = $request->input('remember_me');

        

        if ($validator->fails()) 
        {
            return Redirect::to('/')
            ->withErrors($validator)
            ->withInput($request->except('password'));
        } 
        else 
        {

            $userdata = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password')            
            ];

            if (Auth::attempt($userdata))
            {   
                if (Auth::user()->active == 1) 
                {
                    setcookie('username_login',Auth::user()->name,-1,'/');              
                    return Redirect::to('backend/dashboard');  
                }
                else
                {
                    Auth::logout();
                    Session::flush();
                    return Redirect::route('login')->withMessage('Your Account Is not Activated Yet');
                }

            }
            else
            {
                return Redirect::route('login')->withMessage('Email Or Password Is Wrong');
            }

        }
    }
}
