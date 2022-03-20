<main class="container centered">

    <?php if($formSent): ?>
        <?php if($formSent === 1): ?>
            <p class="alert">¡Formulario Enviado Correctamente!</p>
        <?php elseif($formSent === 2): ?>            
            <p class="alert error">Ocurrió un Error al Enviar el Formulario.</p>
        <?php endif; ?>
    <?php endif; ?>

    <?php showErrors($errors); ?>

    <h1>Contácto</h1>

    <picture>
        <source srcset="/public/build/img/contacto.webp" type="image/webp">
        <img src="/public/build/img/contacto.jpg" alt="Imagen Contácto">
    </picture>

    <h2 class="h2-contact">Llene el Formulario de Contácto</h2>

    <!--  -->
    <form class="form" method='POST'>
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" placeholder="Tu Nombre" name="nombre" value="<?php echo $_POST['nombre']??'' ?>" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required><?php echo $_POST['mensaje']??'' ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Sobre la Propiedad</legend>
        
            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="tipo" required>
                <option disabled selected>-- Seleccione --</option>
                <option <?php if($_POST['tipo'] === 'Compra'){echo 'selected';} ?> value="Compra">Compra</option>
                <option <?php if($_POST['tipo'] === 'Vende'){echo 'selected';} ?> value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto" name="precio" value="<?php echo $_POST['precio']??'' ?>" required>
        </fieldset>

        <fieldset>
            <legend>Contácto</legend>
            
            <p>¿Cómo desea ser contactado?</p>
            <div class="contact-type">
                <label for="contactar-telefono">Teléfono</label>
                <input id="contactar-telefono" type="radio" value="telefono" name="contacto" required>

                <label for="contactar-email">E-mail</label>
                <input id="contactar-email" type="radio" value="email" name="contacto" required>
            </div>

            <div id="contactType"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="button button-green">
    </form>
</main>