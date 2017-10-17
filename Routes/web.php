<?php

Route::get(config('apidoc.route'), 'ApiDocController@index');

// Rotas para gerenciar a documetacao da API
Route::group(['prefix'=>'api-doc'], function(){
    Route::get('/create', ['uses'=>'Docs\ApiDocController@createApiDoc', 'as'=>'apidoc.create']);
    Route::post('/save', ['uses'=>'Docs\ApiDocController@saveApiDoc', 'as'=>'apidoc.save']);
    Route::get('/edit/{id}', ['uses'=>'Docs\ApiDocController@editApiDoc', 'as'=>'apidoc.edit']);
    Route::put('/update/{id}', ['uses'=>'Docs\ApiDocController@updateApiDoc', 'as'=>'apidoc.update']);
});

Route::group(['prefix'=>'resource'], function (){
    Route::get('/create', ['uses'=>'Docs\ResourceController@createResource', 'as'=>'resource.create']);
    Route::post('/save', ['uses'=>'Docs\ResourceController@saveResource', 'as'=>'resource.save']);
    Route::get('/{resourceId}/api/{api}/edit', ['uses'=>'Docs\ResourceController@editResource', 'as'=>'resource.edit']);
    Route::put('/update/{resourceId}/api/{api}/update', ['uses'=>'Docs\ResourceController@updateResource', 'as'=>'resource.update']);
});

Route::group(['prefix'=>'entity'], function (){
    Route::get('/create', ['uses'=>'Docs\EntityController@createEntity', 'as'=>'entity.create']);
    Route::get('/edit/{id}/api/{api}', ['uses'=>'Docs\EntityController@editEntity', 'as'=>'entity.edit']);
    Route::put('/edit/{id}/api/{api}', ['uses'=>'Docs\EntityController@updateEntity', 'as'=>'entity.update']);
    Route::post('/save', ['uses'=>'Docs\EntityController@saveEntity', 'as'=>'entity.save']);
});

Route::group(['prefix'=>'code-status'], function (){
    Route::get('/create', ['uses'=>'Docs\HomeController@createCodeStatus', 'as'=>'codestatus.create']);
    Route::post('/save', ['uses'=>'Docs\HomeController@saveCodeStatus', 'as'=>'codestatus.save']);
    Route::get('/edit/{id}/api/{api}', ['uses'=>'Docs\HomeController@editCodeStatus', 'as'=>'codestatus.edit']);
    Route::put('/edit/{id}/api/{api}', ['uses'=>'Docs\HomeController@updateCodeStatus', 'as'=>'codestatus.update']);
});

Route::group(['prefix'=>'header'], function(){
    Route::get('/edit/{id}/api/{api}', ['uses'=>'Docs\HomeController@editHeader', 'as'=>'header.edit']);
});

Route::get('/doc/{version}', ['uses'=>'Docs\HomeController@index', 'as'=>'doc.index']);
