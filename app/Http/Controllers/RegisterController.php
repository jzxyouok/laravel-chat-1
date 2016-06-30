<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use Input;
use Validator;
use Redirect;
use Hash;
use DB;
use Crypt;
use Config;


class RegisterController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {       
        return View('frontend.register');
    }
    public function submit(Request $request)
    {       

        $data = $request->all();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:60', 
            );

        $message = array(
            'name.required' => 'name cannot be empty.',
            'email.required' => 'Email cannot be empty.',
            'email.email' => 'Email Must Be Like admini@mail.com.',
            'email.unique' => 'Email Already Registered.',
            'password.max' => 'Password Max 60 Character.',
            'password.required' => 'Password cannot be empty.',
            );
        

        $validator = Validator::make($data, $rules, $message);
        if ($validator->fails())
        {
            return Redirect::to('register')->withInput()->withErrors($validator);
        }
        else
        {

            $name = $request->input('name');
            $email = $request->input('email');
            $password = Hash::make($request->input('password'));
            $active = 0;
            $name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move('resources/assets/image/',$name_file);
            $avatar = $name_file;

            // for print out setting
            // dd(Config::get('mail'));

            // testing mail
            // Mail::send('mailing.test_mail', ['user' => 'israj'], function ($message) {
            //     $message->from('93israj.alwan.haliri@gmail.com', 'Administrator');
            //     $message->to('israj.haliri@gmail.com', 'israj')->subject('Register Almost Complete');
            // });

            // echo "done";
            // die();
            
            $UserData = \App\User::create(compact('name', 'email', 'password', 'active', 'avatar'));

            if ($UserData)
            {
                $user = User::findOrFail($UserData->id);                

                Mail::send('mailing.welcome', ['user' => $user], function ($message) use ($user) {
                    $message->from('unicecompany@gmail.com', 'nice company');

                    $message->to($user->email, $user->name)->subject('Register Almost Complete');
                });


                return Redirect::route('register')->withMessage('Your Account Has Been Registered Please Check Your Mailbox or Spam.');   
            }
            else
            {
                return Redirect::route('register')->withMessage('Something Wrong Happend Please Check Your Data And Connection.');  
            }
        }
    }
    public function activate($id)
    {       
        $update = \App\User::find($id);
        $update->active     = 1; 
        if ($update->save()) 
        {
            return Redirect::route('register')->withMessage('Your Account Has been Activated.');
        }
        else
        {
            return Redirect::route('register')->withMessage('Were Not Found Your Account In our Database,Sorry.');
        }
    }
    public function resend(Request $request)
    {       
        $data = $request->all();
        
        $rules = array(
            'email' => 'required|email',
            );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->fails())
        {
            return Redirect::to('request_mail')->withInput()->withErrors($validator);
        }
        else
        {
            $exists = DB::table('users')->where('email', '=', $request->input('email'))->exists();
            if (!$exists) 
            {
                return Redirect::route('request_mail')->withMessage('Your Email Is Not Registered Yet.');  
            }
            else
            {
                $result = DB::table('users')->where('email', '=', $request->input('email'))->first();

                if ($result)
                {
                    $user = User::findOrFail($result->id);

                    Mail::send('mailing.welcome', ['user' => $user], function ($message) use ($user) {
                        $message->from('unicecompany@gmail.com', 'nice company');

                        $message->to($user->email, $user->name)->subject('Register Almost Complete');
                    });
                    return Redirect::route('request_mail')->withMessage('We Have Send You An Email,Please Check Your Email.');   


                }
                else
                {
                    return Redirect::route('request_mail')->withMessage('Something Wrong Happend Please Check Your Data And Connection.');  
                }
            }        
        }
        
    }
    public function request_mail()
    {       
        return View('frontend.resend_mail');
    }
    
}
