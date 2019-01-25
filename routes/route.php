<?php
/**
 * Routing
 */
$router = new Core\Router();

// Add the routes

$router->add('', ['controller' => 'Home', 'action' => 'index']);

// Add the api routes 


//$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);