<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load model
use App\Model\PostCategory;

class WelcomeController extends Controller
{
	function __construct()
	{
		
	}

	public function index()
	{
		return view('welcome');
	}

	public function news()
	{
		return view('welcome');
	}

	public function announcement()
	{
		return view('welcome');
	}

	public function download()
	{
		return view('welcome');
	}
}