<?php declare(strict_types=1);
namespace Controller;

use Router\Router;
use Model\Vendedor;

class VendedoresController {
    public static function index(): void {
        $vendedores = Vendedor::All();
        Router::render('private/vendedores/index', [
            'pageTitle' => 'Administrador de Vendedores',
            'vendedores' => array_reverse($vendedores)
        ]);
    }

    public static function crear(): void {
        $vendedor = new Vendedor;
        $errors = $vendedor->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST);
            $vendedor->setImage($_FILES['imagen']??[]);

            $errors = $vendedor->validate($imageRequired = true);

            if(!$errors) {
                $vendedor->save();
            }
        }

        Router::render('private/vendedores/crear',[
            'pageTitle' => 'Registrar Vendedor(a)',
            'vendedor' => $vendedor,
            'errors' => $errors
        ]);
    }

    public static function actualizar(): void {

        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if(!$id) {
            headerLocationOneBefore();
        }

        $vendedor = Vendedor::find($id);
        $errors = $vendedor->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor->syncAttributes($_POST);

            if($_FILES['imagen']['name']??false) {
                $vendedor->setImage($_FILES['imagen']);
            }

            $errors = $vendedor->validate($imageRequired = false);

            if(!$errors) {
                $vendedor->save();
            }
        }

        Router::render('private/vendedores/actualizar', [
            'pageTitle' => 'Actualizar: ' . $vendedor->nombre . ' ' . $vendedor->apellido,
            'vendedor' => $vendedor,
            'errors' => $errors
        ]);
    }

    public static function borrar(): void {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
            if(!$id) {
                headerLocationOneBefore();
            }

            $vendedor = Vendedor::find($id);
            $vendedor->delete();
        }
    }
}