<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
	public function __construct()
	{

	}
	public function index()
	{
		$content = '/';
		$title_content = 'home';
		$category = 'url';

		\App\Count::create(compact('content', 'title_content', 'category'));
		return view('frontend.home');
	}
}
