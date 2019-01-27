<?php
/**
 * Routing
 */
$router = new Core\Router();

// Add the routes

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('statystyki', ['controller' => 'Skills', 'action' => 'index']);
// Add the api routes 
    
$router->dispatch($_SERVER['QUERY_STRING']);