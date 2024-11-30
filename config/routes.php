<?php

$routes = [
    'user/index' => 'UserController@index',
    'user/create' => 'UserController@create',
    'user/store' => 'UserController@store',
    'user/delete/(\d+)' => 'UserController@delete',
    'user/edit/(\d+)' => 'UserController@edit',
    'user/update' => 'UserController@update',
    'user/show/(\d+)' => 'UserController@show',
    'user/shopping_cart/(\d+)' => 'UserController@shoppingCart',
    'user/buy_list/(\d+)' => 'UserController@buyList',
    'user/buy/(\d+)' => 'UserController@buy',

    'product/create' => 'ProductController@create',
    'product/store' => 'ProductController@store',
    'product/index' => 'ProductController@index',
    'product/search' => 'ProductController@search',
    'product/show/(\d+)' => 'ProductController@show',
    'product/edit/(\d+)' => 'ProductController@edit',
    'product/update/(\d+)' => 'ProductController@update',

    'shopping_cart/create/(\d+)' => 'ShoppingCartController@create',
    'shopping_cart/show/(\d+)' => 'ShoppingCartController@show',

    'buy/show/(\d+)' => 'ShoppingCartController@show',

    'comment/create/(\d+)' => 'CommentController@create',
];

function matchRoute($uri) {
    global $routes;
    foreach ($routes as $route => $controllerAction) {
        $pattern = str_replace('/', '\/', $route); // تبدیل / به \/ برای regex
        $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '(\d+)', $pattern); // تبدیل {id} به (\d+)

        if (preg_match("/^$pattern$/", $uri, $matches)) {
            return ['controllerAction' => $controllerAction, 'params' => array_slice($matches, 1)];
        }
    }
    return null;
}

