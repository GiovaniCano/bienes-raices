<main class="container centered">
    <h1>Actualizar</h1>

    <a href="/admin/blog" class="button button-green">Volver</a>

    <?php showErrors($errors); ?>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/form.php' ?>
        <input type="submit" value="Guardar Cambios" class="button button-green">
    </form>
</main>