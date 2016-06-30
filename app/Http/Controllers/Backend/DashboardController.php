<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	return View::make('backend.dashboard.index');
    }
    public function public_data()
    {
    	$data = array(
    		'avatar' => Auth::user()->avatar,
    		'username' => Auth::user()->name,
    	 );
    	return response($data);
    }
}



