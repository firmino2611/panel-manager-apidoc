<?php

namespace Package\Firmino\Apidoc;

use Package\Firmino\Apidoc\Http\Models\ApiDoc;
use Package\Firmino\Apidoc\Http\Models\Paarameter;

class Doc
{

	public function get(){
		return 'get';
	}
	
	public function getApis()
	{
		return ApiDoc::all();
	}

	public function getParameters(){
		return Parameter::all();
	}
}