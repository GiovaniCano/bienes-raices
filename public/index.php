<?php declare(strict_types=1);
require '../includes/app.php';

use Controller\BlogController;
use Controller\LoginController;
use Controller\PagesController;
use Controller\PropiedadesController;
use Controller\VendedoresController;
use Router\Router;

$router = new Router;

/* public */
$router->GET('/', [PagesController::class, 'index']);

$router->GET('/propiedades', [PagesController::class, 'propiedades']);
$router->GET('/nosotros', [PagesController::class, 'nosotros']);
$router->GET('/blog', [PagesController::class, 'blog']);

$router->GET('/contacto', [PagesController::class, 'contacto']);
$router->POST('/contacto', [PagesController::class, 'contacto']);

$router->GET('/propiedades/propiedad', [PagesController::class, 'propiedad']);
$router->GET('/blog/entrada', [PagesController::class, 'entrada']);

/* login */
$router->GET('/login', [LoginController::class, 'login']);
$router->POST('/login', [LoginController::class, 'login']);

$router->GET('/logout', [LoginController::class, 'logout']);

/* private||admin */
$router->GET('/admin', [PagesController::class, 'admin']);

    /* propiedades */
$router->GET('/admin/propiedades', [PropiedadesController::class, 'index']);

$router->GET('/admin/propiedades/crear', [PropiedadesController::class, 'crear']);
$router->POST('/admin/propiedades/crear', [PropiedadesController::class, 'crear']);

$router->GET('/admin/propiedades/actualizar', [PropiedadesController::class, 'actualizar']);
$router->POST('/admin/propiedades/actualizar', [PropiedadesController::class, 'actualizar']);

$router->POST('/admin/propiedades/borrar', [PropiedadesController::class, 'borrar']);

    /* vendedores */
$router->GET('/admin/vendedores', [VendedoresController::class, 'index']);

$router->GET('/admin/vendedores/crear', [VendedoresController::class, 'crear']);
$router->POST('/admin/vendedores/crear', [VendedoresController::class, 'crear']);

$router->GET('/admin/vendedores/actualizar', [VendedoresController::class, 'actualizar']);
$router->POST('/admin/vendedores/actualizar', [VendedoresController::class, 'actualizar']);

$router->POST('/admin/vendedores/borrar', [VendedoresController::class, 'borrar']);

    /* blog */
$router->GET('/admin/blog', [BlogController::class, 'index']);

$router->GET('/admin/blog/crear', [BlogController::class, 'crear']);
$router->POST('/admin/blog/crear', [BlogController::class, 'crear']);

$router->GET('/admin/blog/actualizar', [BlogController::class, 'actualizar']);
$router->POST('/admin/blog/actualizar', [BlogController::class, 'actualizar']);

$router->POST('/admin/blog/borrar', [BlogController::class, 'borrar']);


/* . */
$router->checkRoute();