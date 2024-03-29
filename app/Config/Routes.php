<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Register/index', 'Register::index');
$routes->get('/login/cekUser', 'Login::cekUser');
$routes->get('/login/logout', 'Login::logout');
$routes->get('/menuadmin/index', 'Menuadmin::index');
$routes->get('/datawisata/delete/(:any)', 'datawisata::delete/$1');
$routes->get('/datawisata/edit/(:segment)', 'datawisata::edit/$1');
$routes->get('/menuadmin/editprofil2/(:segment)', 'menuadmin::editprofil2/$1');
$routes->get('/menuwisatawan/editprofil2/(:segment)', 'menuwisatawan::editprofil2/$1');
$routes->get('/menuwisatawan/updatekriteria/(:segment)', 'menuwisatawan::updatekriteria/$1');
$routes->get('/menuwisatawan/tambahkriteria/(:segment)', 'menuwisatawan::tambahkriteria/$1');
$routes->get('/menuwisatawan/detail/(:segment)', 'menuwisatawan::detail/$1');
