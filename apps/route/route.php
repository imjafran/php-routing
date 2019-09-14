<?php 
use App\Route;

/***
***
** Route::get(ROUTE, CALLBACK Function);
***
***/




Route::get("/", function(){
	echo "Home page";
});


// no matter you use /test or test or test/ , these are same . 
Route::get("test",  function(){
	echo "Test Page";
});

Route::get("/another",  function(){
	echo "Another Page";
});

Route::get("another-page/",  function(){
	echo "Another Page 2";
});







/*
	Redirection is easier now
*/

// ineternal
Route::redirect("/here", "/there");

// external
Route::redirect("jafran", "http://facebook.com/iamjafran");





/*
	Parameter should be :PARAMETER . 
	you can use any variable like
*/
Route::get("/user/:id/", function($myid){
	echo "id is " . $myid;
});

Route::get("/name/:name/", function($name){
	echo "My name is " . $name;
});



/*
	Using Controller Routing
	Pattern CONTROLLER NAME @ METHOD 
	'testCrontroller@simple' means 'testController' is a class and 'simple' is a method inside this class
*/

Route::get("controller", "testController");

Route::get("another/controller", "testController@simple");

