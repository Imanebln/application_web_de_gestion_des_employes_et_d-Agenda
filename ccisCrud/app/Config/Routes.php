<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
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
$routes->get('/', 'Login::index');
// $routes->post('login', 'Login::auth');
$routes->get('membre', 'Membre::index');
$routes->get('salarie', 'Salarie::index');
$routes->get('agenda', 'Agenda::index');
$routes->get('load', 'Agenda::load');
$routes->get('loadMembre', 'Membre::loadMembre');
$routes->get('loadSalarie', 'Salarie::loadSalarie');

$routes->post('submit-form', 'Membre::ajouter');
$routes->post('submit-agenda', 'Agenda::ajouter');
// $routes->post('agendaDate', 'Agenda::show_data_by_date');
$routes->post('submit-salarie', 'Salarie::ajouterSalarie'); 

$routes->post('update-membre', 'Membre::update');
$routes->post('update-agenda', 'Agenda::update');
$routes->post('update-salarie', 'Salarie::update');

$routes->get('delete/(:num)', 'Membre::delete/$1');
$routes->get('delete/(:num)', 'Agenda::delete/$1');
$routes->get('delete/(:num)', 'Salarie::delete/$1');

$routes->get('edit-agenda/(:num)', 'Agenda::singleEvent/$1');
$routes->get('edit-membre/(:num)', 'Membre::singleMembre/$1');
$routes->get('edit-salarie/(:num)', 'Salarie::singleSalarie/$1');

$routes->get('show-agenda/(:num)', 'Agenda::single/$1');
$routes->get('show-membre/(:num)', 'Membre::single/$1');
$routes->get('show-salarie/(:num)', 'Salarie::single/$1');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
