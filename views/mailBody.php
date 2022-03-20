<body>
    
    <h1 style="text-align: center;">Formulario Llenado de Bienes Raices</h1>

    <p style="font-size: 20px;"><b>Nombre:</b> <?php echo $_POST['nombre']??null ?></p>
    <p style="font-size: 20px;"><b>Mensaje:</b> <?php echo $_POST['mensaje']??null ?></p>
    <p style="font-size: 20px;"><b>Vende o Compra:</b> <?php echo $_POST['tipo']??null ?></p>
    <p style="font-size: 20px;"><b>Precio o Presupuesto:</b> <?php echo $_POST['precio']??null ?></p>

    <p style="font-size: 20px;"><b>Forma de contácto:</b> <?php echo $_POST['contacto']??null ?></p>
    <?php if($_POST['contacto']??null === 'telefono'): ?>
        <p style="font-size: 20px;"><b>Teléfono:</b> <?php echo $_POST['telefono']??null ?></p>
        <p style="font-size: 20px;"><b>Fecha:</b> <?php echo $_POST['fecha']??null ?></p>
        <p style="font-size: 20px;"><b>Hora:</b> <?php echo $_POST['hora']??null ?></p>
    <?php elseif($_POST['contacto']??null === 'email'): ?>
        <p style="font-size: 20px;"><b>E-mail:</b> <?php echo $_POST['email']??null ?></p>
    <?php endif; ?>

</body>