<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//credentials
$routes->get('/', 'Credentials::login');
$routes->post('/Register', 'Credentials::register');
$routes->get('/logout', 'Credentials::logout');

$routes->post('/Credentials/credential_validation', 'Credentials::credential_validation');
//Organization
$routes->get('/Organizations', 'Organization::organization_choice');
$routes->get('/Organization/make', 'Organization::organization_make');
$routes->post('/Organization/create', 'Organization::organization_create');
$routes->get('/Organization/verify/(:segment)', 'Organization::organization_verify/$1');

//Multiple organization
$routes->get('/Organization/apply', 'Organization::apply_organization');
$routes->post('/Organization/join', 'Organization::join_organization');

//HR
$routes->get('/HR/add_employee', 'HR::add_employee');
$routes->get('/HR/remove_candidate/(:segment)', 'HR::remove_candidate/$1');


$routes->get('/Dashboard', 'Organization::dashboard');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
