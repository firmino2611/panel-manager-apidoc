<?php

return [

	/* 
	|--------------------
	| BODY TAG OPTIONS:
	|--------------------
	|-------------------------------------------------
	|	Theme Skin
	|-------------------------------------------------
	|	skin-blue | skin-black | skin-purple | skin-yellow | skin-red | skin-green 
	|	skin-blue-light | skin-black-light | skin-purple-light | skin-yellow-light | skin-red-light | skin-green-light 
	*/
	'theme' => [
		'panel' => 'skin-blue-light',
		'doc' => 'skin-blue-light'
	],


	/*
	|-------------------------------------------------
	|	Layout option
	|-------------------------------------------------
	|	fixed | layout-boxed | layout-top-nav | sidebar-collapse | sidebar-mini        
	*/
	'layouts' => [
		'panel' => [
			'fixed', 'sidebar-mini'
		],
		'doc' => [
			'layout-boxed'	
		]
	],
	/*
	|------------------------------------------------
	|	Default route
	|------------------------------------------------
	|	Default route to grant access panel
	|
	*/
	'route' => 'apidoc'

];