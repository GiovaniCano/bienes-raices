<?php declare(strict_types=1);
namespace Controller;

use Router\Router;
use Model\Vendedor;
use Model\Propiedad;

class PropiedadesController {
    public static function index(): void {
        $propiedades = Propiedad::All();
        Router::render('private/propiedades/index', [
            'pageTitle' => 'Administrador de Bienes Raíces',
            'propiedades' => array_reverse($propiedades),
        ]);
    }

    public static function crear(): void {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::All();
        $errors = $propiedad->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST);
            $propiedad->setImage($_FILES['imagen']??[]);

            $errors = $propiedad->validate($imageRequired = true);

            if(!$errors) {
                $propiedad->save();
            }
        }

        Router::render('private/propiedades/crear',[
            'pageTitle' => 'Crear Anuncio de Propiedad',
            'propiedad' => $propiedad,
            'errors' => $errors,
            'vendedores' => $vendedores
        ]);
    }

    public static function actualizar(): void {
        $vendedores = Vendedor::All();

        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if(!$id) {
            headerLocationOneBefore();
        }

        $propiedad = Propiedad::find($id);
        $errors = $propiedad->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad->syncAttributes($_POST);

            if($_FILES['imagen']['name']??false) {
                $propiedad->setImage($_FILES['imagen']);
            }

            $errors = $propiedad->validate($imageRequired = false);

            if(!$errors) {
                $propiedad->save();
            }
        }

        Router::render('private/propiedades/actualizar', [
            'pageTitle' => 'Actualizar: ' . $propiedad->titulo,
            'propiedad' => $propiedad,
            'errors' => $errors,
            'vendedores' => $vendedores
        ]);
    }

    public static function borrar(): void {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
            if(!$id) {
                headerLocationOneBefore();
            }

            $propiedad = Propiedad::find($id);
            $propiedad->delete();
        }
    }
}