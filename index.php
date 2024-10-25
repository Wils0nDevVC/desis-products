<?php
require_once './core/URL.php';
require_once './controller/ProductoController.php';
require_once './controller/BodegaController.php';
require_once './controller/SucursalController.php';
require_once './controller/MonedaController.php';
require_once './controller/MaterialController.php';


require_once './core/Router.php';

$router = new Router();
$router->addRoute('/desis', 'ProductoController', 'index'); 
$router->addRoute('/desis/producto/crear', 'ProductoController', 'crearProducto'); 
$router->addRoute('/desis/bodegas', 'BodegaController', 'findAll'); 
$router->addRoute('/desis/sucursales', 'SucursalController', 'findAll'); 
$router->addRoute('/desis/monedas', 'MonedaController', 'findAll'); 
$router->addRoute('/desis/materiales', 'MaterialController', 'findAll'); 

$router->run();
