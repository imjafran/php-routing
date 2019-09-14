# php-route

Simple PHP Fast Routing for Small Web Application or Rest API . 

### Features

1. Easy Deployment 
2. Fastest Routing
3. Parameter Supports
4. Request Handlier [GET, POST, PUT, DELETE, ANY]
5. Controller Forwarding
6. Redirecting



### User Guide

###### Route Structures

`Route::METHOD(ROUTE, CALLBACK);`



That means, a route should be like 

```php
Route::get("/", function(){

echo "This is home page";	

});
```

```php
Route::get("contact", function(){

echo "This is contact page";	

});


```

