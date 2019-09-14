# DRIM PHP Route

Simple PHP Fast Routing for Small Web Application or Rest API . 

**DRIM** is the abbreviation of **D**ispite **R**edicule **I**t's **M**ade .  Basically its being published as an open source PHP Micro Framework . As far now, I'm publishing it's basic routing system . 



### Features

1. Easy Deployment 
2. Fastest Routing
3. Parameter Supports
4. Request Handlier [GET, POST, PUT, DELETE, ANY]
5. Redirecting
6. Controller Forwarding



### User Guide

How to use DRIM PHP Route

##### Understanding Route Structures

`Route::METHOD(ROUTE, CALLBACK);`



That means, a route should be like 

```php
Route::get("/", function(){
	echo "This is home page";	
});
```

```php
Route::get("/contact", function(){
	echo "This is contact page";	
});
```

##### Using Parameter 

You can use parameters . Follow this structure  .



```php
Route::get("/user/{id}", function($id){
	echo "This is user number " . $id;	
});
```

or

```php
Route::get("/name/:myname", function($someName){
	echo "My name is " . $someName;	
});
```

Muliple Parameter shoule be like this

```php
Route::get("/post/{user}/{post}", function($user, $post){	
	echo "Show the post number " . $post . " of " . $user . " user";	
});
```



##### Request Method

It supports request handling . 

like if you are thinking to apply post method, just use method post for `Route::post();`

```php
Route::post("/about/", function(){	
	echo "About Page";	
});
```



You can use 6 different method . The list is bellow

1. GET
2. POST
3. PUT
4. DELETE
5. ANY

**any** method is basically cross of all method . 



Examples:

```php
Route::get("/about/", function(){	
	echo "About Page, only get request allow";	
});

Route::post("/about/", function(){	
	echo "About Page, only post request allow";	
});

Route::put("/about/", function(){	
	echo "About Page, only post put allow";	
});

Route::delete("/about/", function(){	
	echo "About Page, only post delete allow";	
});

Route::any("/about/", function(){	
	echo "About Page, all available requests are allowed";	
});
```





##### Directing

You  can redirect any url to another . 

Internal usage

```php
Route::redirect('/here', '/there');
```

External usage

```php
Route::redirect('/jafran', 'https://www.facebook.com/iamjafran');
```



##### Controller Forwarding

You can easily navigate your request to controller class . 

```php
Route::get('/test', 'yourController@test');
```

Here, `yourController` is a class in your controller folder and `test` is a method of this class .  

You can just forward your controller to `__construct` method by justing not mentioning any method name .

Easy!

```php
Route::get('/test', 'yourController');
```





### .htaccess

the `.htacccess` file should be like this

```php
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php [NC,L,QSA]
```





### Contribution

The base developer is [Jafran Hasan](http://facebook.com/iamjafran) . Dhaka Polytechnic Institute . 

The core contributors are... [awaiting]

See the websites based on this DRIM Routing System . 

www.btebresults.com 

My project website : www.returnxero.com 

