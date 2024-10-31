<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pagina/login', 'Producto::login');
$routes->get('pagina/', 'Producto::listaProductos');
$routes->get('pagina/verDetalle/(:num)', 'Producto::verDetalle/$1');

$routes->post('pagina/validaUsuario', 'Producto::validaUsuario');

$routes->get('pagina/verCarrito', 'Producto::verCarrito');


$routes->get('pagina/salir', 'Producto::salir');

$routes->post('pagina/insertCarrito', 'Producto::insertCarrito');




