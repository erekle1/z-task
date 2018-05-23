<?php

include dirname(__FILE__) . '/Route.php';



//require_once dirname(__FILE__) . '/Route.php';

Route::get('/hello/user', 'dsds');

Route::post('/hello/user', function (){
	echo "No POST requests allowed for this endpoint.";
});
//
Route::post('/save', function (){
	echo "Item Saved.";
});
