
<?php

//-------------------------------------------------> 1111111111111111111111111111111111111111111111
//require_once __DIR__ . '/Controllers/UserController.php';
//require_once __DIR__ . '/Controllers/ProductController.php';
require_once './config/routes.php';


$uri = trim(str_replace('/project', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
$requestMethod = $_SERVER['REQUEST_METHOD'];

$route = matchRoute($uri);

if ($route) {
    list($controller, $method) = explode('@', $route['controllerAction']);
//    $controllerFile = realpath(__DIR__ . '/../controllers/' . $controller . '.php');

    $controllerFile = __DIR__ . './controllers/'. $controller . '.php';
//    $controllerFile = '';


    require_once $controllerFile;

    // ساخت نمونه کنترلر
    $controllerInstance = new $controller();


    // فراخوانی متد کنترلر با پارامترهای استخراج‌شده
    call_user_func_array([$controllerInstance, $method], $route['params']);
} else {
    // مدیریت 404
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
