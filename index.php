<?php 
define("BASE_PATH", __DIR__ . DIRECTORY_SEPARATOR);
date_default_timezone_set("Asia/Dhaka");
use App\Route;

/*
Develeper: Jafran Hasan
Developer URI: http:://facebook.com/iamjafran
*/


// user routes
require_once __DIR__ . '/apps/route/app.php';
require_once __DIR__ . '/apps/route/route.php';


if(Route::$routeFound==NULL){
	echo "<center>Error 404 | Not Found</center>";
}

