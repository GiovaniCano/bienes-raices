<?php declare(strict_types=1);
namespace Controller;

use Model\EntradaDeBlog;
use Model\Propiedad;
use Router\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PagesController {

    public static function admin(): void {
        Router::render('private/admin', [            
            'pageTitle' => 'Administrar Contenido',
            'user' => $_SESSION['user'],
            'welcomed' => $_SESSION['welcomed']
        ]);
        $_SESSION['welcomed'] = true;
    }

    public static function index(): void {
        $propiedades = Propiedad::get(3);
        $entradas = EntradaDeBlog::get(3);
        Router::render('public/index', [
            'pageTitle' => 'Bienes Raíces',
            'index' => true,
            'propiedades' => $propiedades,
            'entradas' => $entradas
        ]);
    }

    public static function propiedades(): void {
        $propiedades = Propiedad::all();
        Router::render('public/propiedades', [
            'pageTitle' => 'Propiedades en Venta',
            'propiedades' => $propiedades
        ]);
    }
    
    public static function propiedad(): void {
        $id = filter_var($_GET['id']??null, FILTER_VALIDATE_INT);
        if(!$id) { header('location: /propiedades'); }

        $propiedad = Propiedad::find($id);

        Router::render('public/propiedad', [
            'pageTitle' => $propiedad->titulo,
            'propiedad' => $propiedad
        ]);
    }

    public static function nosotros(): void {
        Router::render('public/nosotros', [
            'pageTitle' => 'Conoce Sobre Nosotros'
        ]);
    }

    public static function blog(): void {
        $entradas = EntradaDeBlog::all();
        Router::render('public/blog', [   
            'pageTitle' => 'Nuestro Blog',
            'entradas' => ($entradas)
        ]);
    }

    public static function entrada(): void {
        $id = filter_var($_GET['id']??null, FILTER_VALIDATE_INT);
        if(!$id) { header('location: /blog'); }

        $entrada = EntradaDeBlog::find($id);

        Router::render('public/entrada', [
            'pageTitle' => $entrada->titulo,
            'entrada' => $entrada
        ]);
    }

    public static function contacto(): void {
        $errors = [];
        $_POST['tipo'] = $_POST['tipo'] ?? null;
        $_POST['contacto'] = $_POST['contacto'] ?? null;
        $_POST['nombre'] = $_POST['nombre']??null;
        $_POST['mensaje'] = $_POST['mensaje']??null;
        $_POST['precio'] = $_POST['precio']??null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!$_POST['nombre']
                ||!$_POST['mensaje']
                ||!$_POST['tipo']
                ||!$_POST['precio']
                ||!$_POST['contacto']
            ) {
                $errors = errorCamposRequeridos($errors);
            }

            if($_POST['contacto'] === 'telefono') {
                $_POST['telefono'] = $_POST['telefono'] ?? null;
                if(!$_POST['telefono']) {
                    $errors = errorCamposRequeridos($errors);
                }
            } else if($_POST['contacto'] === 'email') {
                $_POST['contacto'] = $_POST['email'] ?? null;
                if(!$_POST['contacto']) {
                    $errors = errorCamposRequeridos($errors);
                }
            } else {
                $errors = errorCamposRequeridos($errors);
            }

            if(!$errors) {
                $phpmailer = new PHPMailer();
                $phpmailer->isSMTP();
                $phpmailer->Host = 'smtp.mailtrap.io';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 2525;
                $phpmailer->Username = '7655cc7c118432';
                $phpmailer->Password = 'af7085d52be1c7';
    
                $phpmailer->setFrom('contacto@bienesraices.com', 'Formulario de Contácto');
                $phpmailer->addAddress('webMaster@bienesraices.com', 'webMaster');
                $phpmailer->Subject = 'Formulario Llenado en bienesRaices';
    
                $phpmailer->isHTML();
                $phpmailer->CharSet = 'UTF-8';
    
                ob_start();
                include '../views/mailBody.php';
                $body = ob_get_clean();
                // echo $body; exit;
    
                $phpmailer->Body = $body;
                $phpmailer->AltBody = 'Texto alternativo sin html';
    
                $sent = $phpmailer->send();
    
                if($sent) {
                    $formSent = 1;
                } else {                
                    $formSent = 2;
                }
            }
        }

        Router::render('public/contacto', [
            'pageTitle' => 'Contácto',
            'formSent' => $formSent ?? false,
            '_POST' => $_POST,
            'errors' => $errors
        ]);
    }
}