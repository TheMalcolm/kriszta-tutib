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

$router->get('/hello-world', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'cosmetics-appointment'], function() use ($router) {
    $router->get('', ['uses' => 'CosmeticsAppointmentController@list']);
    $router->post('', ['uses' => 'CosmeticsAppointmentController@store']);
    $router->delete('{cosmeticsAppointmentId}', ['uses' => 'CosmeticsAppointmentController@destroy']);
});

$router->group(['prefix' => 'pet-hotel-reservation'], function() use ($router) {
    $router->get('', ['uses' => 'PetHotelReservationController@list']);
    $router->post('', ['uses' => 'PetHotelReservationController@store']);
    $router->delete('{petHotelReservationId}', ['uses' => 'PetHotelReservationController@destroy']);
});