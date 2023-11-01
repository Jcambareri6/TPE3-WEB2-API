<?php
require_once './libs/Router.php';
require_once './App/Controllers/productos.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('productos', 'GET', 'productosController', 'getProducts');
 $router->addRoute('productos/:ID', 'GET', 'productosController', 'getProduct');
$router->addRoute("productos/Condicion/:CONDICION",'GET','productosController','getProductByCondicion');
$router->addRoute('productos/:ID', 'DELETE', 'productosController', 'deleteProduct');
$router->addRoute('productos', 'POST', 'productosController', 'GuardarProducto');


 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);