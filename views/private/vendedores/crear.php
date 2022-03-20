<main class="container centered">
    <h1>Registrar Vendedor(a)</h1>

    <a href="/admin/vendedores" class="button button-green">Volver</a>

    <?php showErrors($errors); ?>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php require __DIR__ . '/form.php' ?>
        <input type="submit" value="Registrar" class="button button-green">
    </form>
</main>