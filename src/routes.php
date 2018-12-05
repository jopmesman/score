<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'score', 'namespace' => 'Jopmesman\Score\Http\Controllers'], function(){
   Route::get('/', ['uses' => 'GameController@index']);

   Route::get('/create', ['uses' => 'GameController@create', 'as' => 'games.create']);

   Route::group(['as' => 'game' ,'prefix' => '{game}', 'middleware' => ['gameParticipant']], function(){
      Route::get('/',['as' => '.view', 'uses' => 'GameController@game']);
      Route::post('/{participant}/score', ['as' => '.score', 'uses' => 'GameController@score']);
   });
});