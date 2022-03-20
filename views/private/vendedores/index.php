<main class="container">

    <?php $result = $_GET['r'] ?? null;
    if($result == 1): ?>
            <p class="alert">Vendedor(a) registrado(a) correctamente</p>
        <?php elseif($result == 2): ?>
            <p class="alert">Datos de vendedor(a) actualizados correctamente</p>
        <?php elseif($result == 3): ?>
            <p class="alert">Vendedor(a) eliminado(a) correctamente</p>
        <?php elseif($result == 4): ?>
            <p class="alert error">"<?php echo $_SESSION['user'] ?>" no puede modificar el contenido demostrativo. Crea contenido para modificarlo.</p>
    <?php endif; ?>

    <h1>Administrador de Vendedores</h1>

    <div class="buttons-top-admin">
        <a href="/admin" class="button button-green button-volver">Volver</a>
        <a href="/admin/vendedores/crear" class="button button-green">Registrar Vendedor(a)</a>
    </div>

    <table class="table-admin">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fotografía</th>
                <th>Teléfono</th>
                <th>Acciones</th>
                <th class="table-mobile">Vendedores</th>
            </tr>
        </thead>
        <tbody> <!-- mostrar los resultados -->
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></td>
                <td><img src="/public/user-images/vendedores/<?php echo $vendedor->imagen; ?>" alt="Foto Vendedor" class="image-table"></td>
                <td><?php echo $vendedor->telefono; ?></td>

                <td>
                    <form method="POST" action="/admin/vendedores/borrar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>"> 
                        <input type="submit" class="button button-red " value="Eliminar">
                    </form>

                    <a href="/admin/vendedores/actualizar/<?php echo $vendedor->id; ?>" class="button button-orange">Actualizar</a>
                </td>

                <td class="table-mobile">
                    <div class="table-mobile-head">
                        <p><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></p>
                        <div><img src="/public/user-images/vendedores/<?php echo $vendedor->imagen; ?>" alt="Foto Vendedor" class="image-table"></div>
                    </div>
                    <div class="table-mobile-buttons">
                        <form method="POST" action="/admin/vendedores/borrar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>"> 
                            <input type="submit" class="button button-red " value="Eliminar">
                        </form>

                        <a href="/admin/vendedores/actualizar/<?php echo $vendedor->id; ?>" class="button button-orange">Actualizar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>