<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {


    // BLOG

    $r->addRoute('GET', '/', ['App\controllers\BlogControllers', 'posts']);
    $r->addRoute('GET', '/contacts', ['App\controllers\BlogControllers', 'contacts']);
    // $r->addRoute('GET', '/prog', ['App\controllers\BlogControllers', 'prog']);
    $r->addRoute('GET', '/program', ['App\controllers\BlogControllers', 'program']);

    $r->addRoute('GET', '/prog', ['App\controllers\BlogControllers', 'prog']);

    $r->addRoute('GET', '/post/{id:\d+}', ['App\controllers\BlogControllers', 'post']);
    $r->addRoute('POST', '/posts/serarch/', ['App\controllers\BlogControllers', 'serarch']);
    $r->addRoute('GET', '/posts/serarch/{tag}', ['App\controllers\BlogControllers', 'serarchTag']);

    $r->addRoute('GET', '/politika', ['App\controllers\BlogControllers', 'politika']);



	// POSTS
    $r->addRoute('GET', '/admin', ['App\controllers\AdminPanelController', 'index']);
    $r->addRoute('GET', '/admin/posts', ['App\controllers\AdminPanelController', 'getAll']);
    $r->addRoute('GET', '/admin/posts/{id:\d+}', ['App\controllers\AdminPanelController', 'getOne']);

    $r->addRoute('GET', '/admin/addPost', ['App\controllers\AdminPanelController', 'addPostPage']);

    $r->addRoute('POST', '/admin/addPost', ['App\controllers\AdminPanelController', 'addPost']);

    $r->addRoute('GET', '/admin/updatePost/{id:\d+}', ['App\controllers\AdminPanelController', 'updatePost']);
    $r->addRoute('POST', '/admin/updatePost/update/{id:\d+}', ['App\controllers\AdminPanelController', 'update']);
    $r->addRoute('GET', '/admin/deletePost/{id:\d+}', ['App\controllers\AdminPanelController', 'deletePost']);
    // END




        // // LOGIN
    $r->addRoute('GET', '/login', ['App\controllers\AdminPanelController', 'login']);
    $r->addRoute('POST', '/login/in', ['App\controllers\AdminPanelController', 'loginIn']);


    $r->addRoute('GET', '/admin/user/logout', ['App\controllers\AdminPanelController', 'logout']);

    $r->addRoute('GET', '/registration', ['App\controllers\AdminPanelController', 'registration']);
    $r->addRoute('POST', '/registration/save', ['App\controllers\AdminPanelController', 'save']);



});
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
    echo "404 Not Found";
    break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    echo "405 Method Not Allowed";
    break;
    case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    $container->call($routeInfo[1], $routeInfo[2]);
    break;
}

