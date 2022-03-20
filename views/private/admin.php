<main class="container centered">

    <?php if(!$welcomed): ?>
        <p class="user-logued alert">Bienvenido(a) <?php echo $user; ?></p>
    <?php endif; ?>

    <h1>Administrar Contenido</h1>

    <div class="admin-options">
        <a href="/admin/propiedades">
            <img src="/public/build/img/propiedades-icon.svg" alt="">
            <h2>Propiedades</h2>
        </a>
        <a href="/admin/vendedores">
            <img src="/public/build/img/vendedores-icon.svg" alt="">
            <h2>Vendedores</h2>
        </a>
        <a href="/admin/blog">
            <img src="/public/build/img/blog-icon.svg" alt="">
            <h2>Blog</h2>
        </a>
    </div>

</main>