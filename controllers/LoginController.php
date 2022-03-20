<?php declare(strict_types=1);
namespace Controller;

use Model\Admin;
use Router\Router;

class LoginController {

    public static function login(): void {
        $auth = $_SESSION['login'] ?? false;
        if($auth) {
            header('location: /admin');
        }

        $admin = new Admin();
        $errors = $admin->getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $admin = new Admin($_POST);

            $errors = $admin->validate();

            if(!$errors) {
                $admin->auth();
            }
        }

        Router::render('private/login', [
            'pageTitle' => 'Iniciar Sesión',
            'email' => $admin->email,
            'errors' => $errors
        ]);
    }

    public static function logout(): void {
        $_SESSION = [];
        header('location: /');
    }
}