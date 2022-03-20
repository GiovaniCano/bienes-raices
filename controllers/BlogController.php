<?php declare(strict_types=1);
namespace Controller;

use Model\EntradaDeBlog;
use Router\Router;

class BlogController {
    public static function index(): void {
        $entradas = EntradaDeBlog::All();
        Router::render('private/blog/index', [
            'pageTitle' => 'Administrador del Blog',
            'entradas' => array_reverse($entradas),
        ]);
    }

    public static function crear(): void {
        $entrada = new EntradaDeBlog();
        $errors = $entrada->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $entrada = new EntradaDeBlog($_POST);
            $entrada->signBlogPost();
            $entrada->setImage($_FILES['imagen']??[]);

            $errors = $entrada->validate($imageRequired = true);

            if(!$errors) {
                $entrada->save();
            }
        }

        Router::render('private/blog/crear',[
            'pageTitle' => 'Crear Entrada de Blog',
            'entrada' => $entrada,
            'errors' => $errors,
        ]);
    }

    public static function actualizar(): void {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if(!$id) {
            headerLocationOneBefore();
        }

        $entrada = EntradaDeBlog::find($id);
        $errors = $entrada->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $entrada->syncAttributes($_POST);

            if($_FILES['imagen']['name']??false) {
                $entrada->setImage($_FILES['imagen']);
            }

            $errors = $entrada->validate($imageRequired = false);

            if(!$errors) {
                $entrada->save();
            }
        }

        Router::render('private/blog/actualizar', [
            'pageTitle' => 'Actualizar: ' . $entrada->titulo,
            'entrada' => $entrada,
            'errors' => $errors,
        ]);
    }

    public static function borrar(): void {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
            if(!$id) {
                headerLocationOneBefore();
            }

            $entrada = EntradaDeBlog::find($id);
            $entrada->delete();
        }
    }
}