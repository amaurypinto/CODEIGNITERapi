<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group("api", function ($routes){
    $routes->post("register", "register::index");
    $routes->post("login", "login::index"); // Añadido el punto y coma aquí
    $routes->get("users", "user::index", ['filter' => 'authFilter']);
});
