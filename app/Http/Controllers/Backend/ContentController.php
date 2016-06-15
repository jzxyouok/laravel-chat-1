<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Redirect;

class ContentController extends Controller
{
    public function __construct() 
	{
		
	}
	public function index(Request $request)
	{
		$request_param = $request->input('search');

		if ($request_param)
		{
			$list_data = \App\Content::where('name', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\Content::orderBy('id', 'DESC')->paginate(5);
		}

		return View('backend.content.index',compact('list_data'));
	}

	public function create() 
	{		
		$active = array(
			'1' => 'active', 
			'0' => 'non-active');		
		$category = array(
			'1' => 'about', 
			'2' => 'services',
			'3' => 'portofolio');
		return View('backend.content.create', compact('active','category'));
	}

	public function insert() 
	{
		
	}

	public function edit($id) {

		$active = array(
			'1' => 'active', 
			'0' => 'non-active');
		$category = array(
			'1' => 'about', 
			'2' => 'services',
			'3' => 'portofolio');
		$list_data = \App\Content::find($id);
		return View('backend.content.edit', compact('active','list_data','category'));
	}

	public function update($id) 
	{
		
	}
	public function delete($id) {
		\App\Content::find($id)->delete();
		return Redirect::route('backend/content')->withMessage('Data Has Been Deleted.');
	}
}
