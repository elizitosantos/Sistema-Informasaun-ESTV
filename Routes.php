<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Frontend::index',['filters' => 'authenticated']);
$routes->get('/', 'Auth::index',['filters' => 'authenticated']);
$routes->get('/register', 'Auth::register',['filter' => 'authenticated']);
$routes->get('/Auth', 'Auth::index',['filters' => 'authenticated']);

$routes->get('/update_user', 'Auth::update_user',['filters' => 'authenticate']);
$routes->match(['post'], '/update_user', 'Auth::update_user',['filters' => 'authenticate']);
$routes->get('/Auth/(:segment)', 'Auth::$1',['filters' => 'authenticated']);
$routes->match(['post'], '/register', 'Auth::register',['filters' => 'authenticated']);
$routes->match(['post'], '/login', 'Auth::index',['filters' => 'authenticated']);
$routes->get('/logout', 'Auth::logout');

$routes->group('Home', ['filters'=>'authenticate'], static function($routes){
    $routes->get('', 'Home::index');
    
    $routes->get('(:segment)', 'Home::$1');
    $routes->get('(:segment)/(:any)', 'Home::$1/$2');
    $routes->match(['post'], 'user_edit/(:num)', 'Home::user_edit/$1');
});
// fim authentication nian

$routes->get('estudante/edit/(:num)', 'estudante::edit/$1');
$routes->get('tinanakademik/edit/(:num)', 'TinanAkademik::edit/$1');
$routes->get('estudante/update/(:num)', 'estudante::update/$1');
$routes->get('tinanakadenik/update/(:num)', 'tinanakademik::update/$1');
$routes->get('mestre/edit/(:num)', 'mestre::edit/$1');
$routes->get('mestre/update/(:num)', 'mestre::update/$1');
$routes->get('materia/edit/(:num)', 'materia::edit/$1');
$routes->get('materia/update/(:num)', 'materia::update/$1');
$routes->get('classe/edit/(:num)', 'classe::edit/$1');
$routes->get('classe/update/(:num)', 'classe::update/$1');
$routes->get('turma/update/(:num)', 'turma::update/$1');
$routes->get('horariu/update/(:num)', 'horariu::update/$1');
$routes->get('horariu/edit/(:num)', 'horariu::edit/$1');
// $routes->resource('estudante', ['filter'=> 'isLoggedin']);
$routes->get('estudante/export', 'Estudante::export');
$routes->post('submit-form', 'FormController::formValidation');
$routes->post('/validate-form', 'ProgramaEstudoController::store');
// teste
// app/Config/Routes.php


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
