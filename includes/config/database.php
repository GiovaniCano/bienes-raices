<?php declare(strict_types=1);

try {
    $db = new PDO('mysql:host=localhost;dbname=bienesraices;charset=utf8;', 'root', 'root');
} catch (\Throwable $th) {
    throw $th;
    // echo 'No se pudo conectar a la base de datos';
    exit;
}