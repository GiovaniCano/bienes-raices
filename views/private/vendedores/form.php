<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($vendedor->nombre) ?>" required>   

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($vendedor->apellido) ?>" required> 
    
    <label for="imagen">Fotografía: <span>Formatos: jpg y webp - Tamaño máximo: 2MB</span></label>
    <input type="file" id="imagen" accept="image/jpeg, image/webp" name="imagen" <?php if(!$vendedor->id) { echo 'required'; } ?>>

    <?php if($vendedor->id): ?>
        <img src="/public/user-images/vendedores/<?php echo $vendedor->imagen; ?>" alt="Foto Vendedor" class="image-update">
    <?php endif; ?>

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Telefono:</label>
    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($vendedor->telefono) ?>" required>

</fieldset>