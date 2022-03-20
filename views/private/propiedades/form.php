<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la Propiedad" value="<?php echo s($propiedad->titulo) ?>" required>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad" min="1" step="1" value="<?php echo s($propiedad->precio) ?>" required>
    
    <label for="imagen">Imagen: <span>Formatos: jpg y webp - Tamaño máximo: 2MB</span></label>
    <input type="file" id="imagen" accept="image/jpeg, image/webp" name="imagen" <?php if(!$propiedad->id) { echo 'required'; } ?>>

    <?php if($propiedad->id): ?>
        <img src="/public/user-images/propiedades/<?php echo $propiedad->imagen; ?>" alt="Imagen Propiedad" class="image-update">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <textarea class="min50char" id="descripcion" name="descripcion" value="<?php echo s($propiedad->descripcion) ?>" required><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Número de habitaciones" min="1" max="99" value="<?php echo s($propiedad->habitaciones) ?>" required >

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Número de baños" min="1" max="99" value="<?php echo s($propiedad->wc) ?>" required >
    
    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" id="estacionamiento" name="estacionamientos" placeholder="Número de estacionamientos" min="1" max="99" value="<?php echo s($propiedad->estacionamientos) ?>" required>
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor:</label>
    <select name="vendedorId" id="vendedor" required>
        <option selected disabled>-- Seleccione --</option>

        <?php foreach($vendedores as $vendedor): ?>
            <option <?php if($vendedor->id == $propiedad->vendedorId) { echo 'selected'; } ?> value="<?php echo $vendedor->id; ?>"><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></option>
        <?php endforeach; ?>

    </select>
</fieldset>