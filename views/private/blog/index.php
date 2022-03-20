<main class="container">

    <?php $result = $_GET['r'] ?? null;
    if($result == 1): ?>
            <p class="alert">Entrada del blog creada correctamente</p>
        <?php elseif($result == 2): ?>
            <p class="alert">Entrada del blog actualizada correctamente</p>
        <?php elseif($result == 3): ?>
            <p class="alert">Entrada del blog eliminada correctamente</p>
        <?php elseif($result == 4): ?>
            <p class="alert error">"<?php echo $_SESSION['user'] ?>" no puede modificar el contenido demostrativo. Crea contenido para modificarlo.</p>
    <?php endif; ?>

    <h1>Administrador del Blog</h1>

    <div class="buttons-top-admin">
        <a href="/admin" class="button button-green button-volver">Volver</a>
        <a href="/admin/blog/crear" class="button button-green">Nueva Entrada</a>
    </div>

    <table class="table-admin">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Acciones</th>
                <th class="table-mobile">Entradas</th>
            </tr>
        </thead>
        <tbody> <!-- mostrar los resultados -->
            <?php foreach($entradas as $entrada): ?>
            <tr>
                <td><?php echo $entrada->id; ?></td>
                <td style="max-width: 200px;"><?php echo $entrada->titulo; ?></td>
                <td><img src="/public/user-images/blog/<?php echo $entrada->imagen; ?>" alt="Imagen Entrada" class="image-table"></td>
                <td><?php echo $entrada->getAutor($entrada->autorId); ?></td>

                <td>
                    <form method="POST" action="/admin/blog/borrar">
                        <input type="hidden" name="id" value="<?php echo $entrada->id; ?>"> 
                        <input type="submit" class="button button-red " value="Eliminar">
                    </form>

                    <a href="/admin/blog/actualizar/<?php echo $entrada->id; ?>" class="button button-orange">Actualizar</a>
                </td>

                <td class="table-mobile">
                    <div class="table-mobile-head">
                        <p><?php echo $entrada->titulo; ?></p>
                        <div><img src="/public/user-images/blog/<?php echo $entrada->imagen; ?>" alt="Imagen Entrada" class="image-table"></div>
                    </div>
                    <div class="table-mobile-buttons">
                        <form method="POST" action="/admin/blog/borrar">
                            <input type="hidden" name="id" value="<?php echo $entrada->id; ?>"> 
                            <input type="submit" class="button button-red " value="Eliminar">
                        </form>

                        <a href="/admin/blog/actualizar/<?php echo $entrada->id; ?>" class="button button-orange">Actualizar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>