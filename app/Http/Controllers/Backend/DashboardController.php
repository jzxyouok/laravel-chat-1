<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;

class DashboardController extends Controller
{
    public function index()
    {
    	$list_data = 'on progress';
    	return View::make('backend.dashboard.index',compact('list_data'));
    }
}
