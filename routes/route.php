<?php
/**
 * Routing
 */
$router = new Core\Router();

// Add the routes

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('umiejetnosci', ['controller' => 'Skills', 'action' => 'index']);
$router->add('ekwipunek', ['controller' => 'Equipment', 'action' => 'index']);
$router->add('walka', ['controller' => 'Fight', 'action' => 'index']);

// Add the api routes 
$router->add('select-hero', ['controller' => 'Home', 'action' => 'selectHero']);

$router->dispatch($_SERVER['QUERY_STRING']);