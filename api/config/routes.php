<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/category/{name}',function (Request $request, Response $response, array $args) use ($container){
      $model = new \App\Models\Category($container->get("db"));
      $result = $model->GetQAByCategoryName($args['name']);
      return $response->withJson($result,null,JSON_PRETTY_PRINT);
    });

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $model = new \App\Models\Category($container->get("db"));
        $result = $model->ListCategory();
        return $response->withJson($result,null,JSON_PRETTY_PRINT);
    });


    // Enabling CORS
    // $app->add(function ($req, $res, $next) {
    //   $response = $next($req, $res);
    //   return $response
    //           ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
    //           ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    //           ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    // });
};
