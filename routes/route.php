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
$router->add('statystyki', ['controller' => 'Statistics', 'action' => 'index']);

// Add the api routes 
$router->add('select-hero', ['controller' => 'Home', 'action' => 'selectHero']);
$router->add('get-hero', ['controller' => 'Fight', 'action' => 'getHero']);
$router->add('get-enemy', ['controller' => 'Fight', 'action' => 'getEnemy']);
$router->add('make-fight', ['controller' => 'Fight', 'action' => 'makeFight']);

$router->add('get-skills', ['controller' => 'Skills', 'action' => 'getSkills']);
$router->add('set-skills', ['controller' => 'Skills', 'action' => 'setSkills']);

$router->add('get-equipment', ['controller' => 'Equipment', 'action' => 'getEquipment']);
$router->add('use-item', ['controller' => 'Equipment', 'action' => 'useItem']);

$router->dispatch($_SERVER['QUERY_STRING']);