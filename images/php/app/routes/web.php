<?php

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

/** @var Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * Routes for segments.
 */
$router->get('segments', 'SegmentController@index');
$router->get('segments/{id}', 'SegmentController@show');
$router->post('segments', 'SegmentController@create');
$router->put('segments/{id}', 'SegmentController@update');
$router->delete('segments/{id}', 'SegmentController@destroy');

/**
 * Routes for families.
 */
$router->get('families', 'FamilyController@index');
$router->get('families/{id}', 'FamilyController@show');
$router->post('families', 'FamilyController@create');
$router->put('families/{id}', 'FamilyController@update');
$router->delete('families/{id}', 'FamilyController@destroy');
$router->get('segments/{segmentId}/families', 'FamilyController@familiesBySegmentId');

/**
 * Routes for classes.
 */
$router->get('classes', 'ClassificationController@index');
$router->get('classes/{id}', 'ClassificationController@show');
$router->post('classes', 'ClassificationController@create');
$router->put('classes/{id}', 'ClassificationController@update');
$router->delete('classes/{id}', 'ClassificationController@destroy');
$router->get('families/{familyId}/classes', 'ClassificationController@classesByFamilyId');

/**
 * Routes for commodities.
 */
$router->get('commodities', 'CommodityController@index');
$router->get('commodities/{id}', 'CommodityController@show');
$router->post('commodities', 'CommodityController@create');
$router->put('commodities/{id}', 'CommodityController@update');
$router->delete('commodities/{id}', 'CommodityController@destroy');
$router->get('classes/{classId}/commodities', 'CommodityController@commoditiesByClassId');
$router->get('families/{familyId}/classes/{classId}/commodities', 'CommodityController@commoditiesByFamilyIdAndClassId');
