<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'api'], function () use ($router) {
    // $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('/authors', 'AuthorController@index');
        $router->get('/author/{id}', 'AuthorController@index');
        $router->post('/author', 'AuthorController@store');
        $router->put('/author/{id}', 'AuthorController@update');
        $router->delete('/author/{id}', 'AuthorController@delete');

        $router->get('/books', 'BookController@index');
        $router->get('/book/{id}', 'BookController@index');
        $router->post('/book', 'BookController@store');
        $router->put('/book/{id}', 'BookController@update');
        $router->delete('/book/{id}', 'BookController@delete');
     });

$router->get('/', function () use ($router) {
    return $router->app->version();
});