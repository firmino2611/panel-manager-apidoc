<?php

namespace Package\Firmino\Apidoc\Facades;

use Illuminate\Support\Facades\Facade;

class Apidoc extends Facade
{
	
	protected static function getFacadeAccessor()
	{
		return 'Apidoc.doc';
	}
}