<?php

namespace Package\Firmino\Apidoc\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiDocController extends Controller
{
	
	public function index()
	{
		return view('Apidoc::index');
	}
}