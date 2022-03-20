<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/build/img/icon.ico" type="image/x-icon">
    <title><?php echo $pageTitle ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="preload" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="preload" href="/public/build/css/style.css" as="style">
    <link rel="stylesheet" href="/public/build/css/style.css">
</head>
<body>
    <header class="<?php if($index??false) { echo 'index'; } ?>">
        <div class="bar">
            <div class="bar-content container">
                <a href="/">
                    <img src="/public/build/img/logo.svg" alt="Propiedades Logo">
                </a>
                <img class="mobile-menu" src="/public/build/img/barras.svg" alt="Menú Icon">
                <div class="bar-right">
                    <div class="nav-extra-options">
                        <?php if($_SESSION['login']??false): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                        <img class="dark-mode-icon" src="/public/build/img/dark-mode.svg" alt="Dark-mode">
                    </div>
                    <nav class="nav nav-header">
                        <a href="/">Inicio</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contácto</a>
                    </nav>
                </div>
            </div>
        </div>
        <?php if($index??false): ?>
            <div class="container">
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            </div>
        <?php endif; ?>
    </header>

<?php echo $content; ?>

    <footer>
        <div class="container">
            <nav class="nav nav-footer">
                <a href="/">Inicio</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/nosotros">Nosotros</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contácto</a>
            </nav>
            <p>Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
        </div>
    </footer>

<script src="/public/build/js/scripts.js"></script>
</body>
</html>