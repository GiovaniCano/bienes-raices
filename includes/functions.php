<?php

use Model\Admin;
use Model\EntradaDeBlog;

function debug(mixed $foo, bool $exit = true): void {
    echo '<pre style="background-color: rgb(0,0,18); color: rgb(0,175,0); padding: 7px; font-size: 17px; margin: 0;">';
    var_dump($foo);
    echo '</pre>';
    if($exit) exit;
}

/**
 * @param string $string String to trim
 * @param int $type 1 = para propiedad, 2 = para bLog
 */
function limitString(string $string, int $type): string {
    if($type === 1) {
        return substr($string, 0, 140) . '...';
    }
    if($type === 2) {
        return substr($string, 0, 80) . '...';
    }
}

/** Insert the error "campos requeridos" in the array "errors" only if it hasn't been included */
function errorCamposRequeridos(array $errors): array {
    $string = 'Todos los campos son requeridos';
    if(!in_array($string, $errors)) {
        $errors[] = $string;
    }
    return $errors;
}

/** Sanitize just for forms placeholders */
function s(mixed $possibleHTML): string {
    return htmlspecialchars(strval($possibleHTML));
}

/** Show the errors produced by a form */
function showErrors(array $errors): void {
    foreach($errors as $error) {
        ?><p class="alert error"><?php echo $error; ?></p><?php
    }
}

/** header("location: ") cutting out the last part of the current url
 * @param  string $_GETVariables include de "?" after the url, e.g: "?id=1"
 */
function headerLocationOneBefore(array $variables = []): void {
    $indexHeader = explode('/', $_SERVER['PATH_INFO']);
    array_pop($indexHeader);
    $indexHeader = join('/', $indexHeader);

    $GETvariables = '';
    foreach($variables as $variable) {
        $GETvariables .= "/${variable}";
    }

    header("location: ${indexHeader}${GETvariables}");
    exit;  
}