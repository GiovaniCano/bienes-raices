<main class="container">

    <?php $result = $_GET['r'] ?? null;
    if($result == 1): ?>
            <p class="alert">Anuncio de propiedad creado correctamente</p>
        <?php elseif($result == 2): ?>
            <p class="alert">Anuncio de propiedad actualizado correctamente</p>
        <?php elseif($result == 3): ?>
            <p class="alert">Anuncio de propiedad eliminado correctamente</p>
        <?php elseif($result == 4): ?>
            <p class="alert error">"<?php echo $_SESSION['user'] ?>" no puede modificar el contenido demostrativo. Crea contenido para modificarlo.</p>
    <?php endif; ?>

    <h1>Administrador de Bienes Raíces</h1>

    <div class="buttons-top-admin">
        <a href="/admin" class="button button-green">Volver</a>
        <a href="/admin/propiedades/crear" class="button button-green">Nueva Propiedad</a>
    </div>

    <table class="table-admin">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
                <th class="table-mobile">Propiedades</th>
            </tr>
        </thead>
        <tbody> <!-- mostrar los resultados -->
            <?php foreach($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td style="max-width: 200px;"><?php echo $propiedad->titulo; ?></td>
                <td><img src="/public/user-images/propiedades/<?php echo $propiedad->imagen; ?>" alt="Imagen Propiedad" class="image-table"></td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" action="/admin/propiedades/borrar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> 
                        <input type="submit" class="button button-red " value="Eliminar">
                    </form>

                    <a href="/admin/propiedades/actualizar/<?php echo $propiedad->id; ?>" class="button button-orange">Actualizar</a>
                </td>

                <td class="table-mobile">
                    <div class="table-mobile-head">
                        <p><?php echo $propiedad->titulo; ?></p>
                        <div><img src="/public/user-images/propiedades/<?php echo $propiedad->imagen; ?>" alt="Imagen Propiedad" class="image-table"></div>
                    </div>
                    <div class="table-mobile-buttons">
                        <form method="POST" action="/admin/propiedades/borrar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> 
                            <input type="submit" class="button button-red " value="Eliminar">
                        </form>

                        <a href="/admin/propiedades/actualizar/<?php echo $propiedad->id; ?>" class="button button-orange">Actualizar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>