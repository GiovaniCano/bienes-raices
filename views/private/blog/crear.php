<main class="container centered">
    <h1>Crear Entrada de Blog</h1>

    <a href="/admin/blog" class="button button-green">Volver</a>

    <?php showErrors($errors); ?>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php require __DIR__ . '/form.php' ?>
        <input type="submit" value="Crear" class="button button-green">
    </form>
</main>