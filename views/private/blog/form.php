<fieldset>
    <legend>Entrada</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la entrada" value="<?php echo s($entrada->titulo) ?>" required>
    
    <label for="imagen">Imagen: <span>Formatos: jpg y webp - Tamaño máximo: 2MB</span></label>
    <input type="file" id="imagen" accept="image/jpeg, image/webp" name="imagen" <?php if(!$entrada->id) { echo 'required'; } ?>>

    <?php if($entrada->id): ?>
        <img src="/public/user-images/blog/<?php echo $entrada->imagen; ?>" alt="Imagen Blog" class="image-update">
    <?php endif; ?>

    <label for="contenido">Contenido:</label>
    <textarea class="min50char" id="contenido" name="contenido" required><?php echo s($entrada->contenido) ?></textarea>
</fieldset>