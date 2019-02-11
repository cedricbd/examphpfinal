<?php

$routes = new Router;



$routes->get('/conducteurs',                'ConducteursController@index');
$routes->get('/conducteurs/(\d+)',          'ConducteursController@show');
$routes->get('/conducteurs/add',            'ConducteursController@add');
$routes->post('/conducteurs/save',          'ConducteursController@save');
$routes->get('/conducteurs/(\d+)/edit',     'ConducteursController@edit');
$routes->get('/conducteurs/(\d+)/delete',   'ConducteursController@delete');

$routes->get('/vehicules',              'VehiculesController@index');
$routes->get('/vehicules/(\d+)',        'VehiculesController@show');
$routes->get('/vehicules/add',          'VehiculesController@add');
$routes->post('/vehicules/save',        'VehiculesController@save');
$routes->get('/vehicules/(\d+)/edit',   'VehiculesController@edit');
$routes->get('/vehicules/(\d+)/delete', 'VehiculesController@delete');

$routes->get('/locations',              'LocationsController@index');
$routes->get('/locations/add',          'LocationsController@add');
$routes->post('/locations/save',        'LocationsController@save');
$routes->get('/locations/(\d+)/delete', 'LocationsController@delete');

$routes->get('/',  'PagesController@home');

$routes->run();