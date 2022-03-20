<main class="container centered">
    <h1>Iniciar Sesión</h1>
    
    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <p class="alert error"><?php echo $error; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form class="form" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail:</label>
            <input id="email" type="email" placeholder="Tu Email" name="email" value="<?php echo s($email) ?>" required>

            <label for="password">Contraseña:</label>
            <input id="password" type="password" placeholder="Tu contraseña" name="password" required>
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="button button-green  ">
    </form>
</main>

<div class="demo-alert">
	<img class="x-close" src="public/build/img/x.svg" alt="X">
	<div>
		<p>Mensaje de sitio demostrativo:</p>
		<p>Usa estas credenciales:</p>
        <p>Email = <span>correo@correo.com</span></p>
        <p>Contraseña = <span>1234</span></p>
	</div>
</div>