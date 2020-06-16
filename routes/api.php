<?php

use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;


Route::group([
    'middleware' => 'jwt.verify'
], function ($router) {

Route::any('/{any}', function (ServerRequestInterface $request) {
	//$container = $app->getContainer();
    $config = new Config([
        'username' => env('DB_USERNAME', 'forge'),
        'password' => env('DB_PASSWORD', ''),
        'database' => env('DB_DATABASE', 'forge'),
        'address' => env('DB_HOST', '127.0.0.1'),
        'debug' => true,
        'middlewares' => 'authorization',
        'openApiBase' => '{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}',
        'basePath' => '/api',
       /* 'authorization.tableHandler' => function ($operation, $tableName) {
    		return $tableName != 'usuarios';
		},*/
		'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
		    return !($tableName == 'usuarios' && $columnName == 'password');
		},
		/*'authorization.recordHandler' => function ($operation, $tableName) {
  	 		return ($tableName == 'usuarios') ? 'filter=username,neq,admin' : '';
		},*/
    ]);
    $api = new Api($config);
    $response = $api->handle($request);
    return $response;
})->where('any', '.*');

});