<?php

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;

Route::any('/{any}', function (ServerRequestInterface $request) {
    $config = new Config([
        'username' => 'root',
        'password' => '',
        'database' => 'nuevo',
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);
    return $response;
})->where('any', '.*');