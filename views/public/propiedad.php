<main class="container centered">

    <h1><?php echo $propiedad->titulo ?></h1>

    <img src="/public/user-images/propiedades/<?php echo $propiedad->imagen ?>" alt="Imagen Propiedad" >

    <div class="card-bottom">
        <p class="card-price">$ <?php echo $propiedad->precio ?></p>
        <div class="card-icons card-icons-page">
            <div class="card-icon">
                <img src="/public/build/img/icono_dormitorio.svg" alt="Dormitorio">
                <p><?php echo $propiedad->habitaciones ?></p>
            </div>
            <div class="card-icon">
                <img src="/public/build/img/icono_wc.svg" alt="wc">
                <p><?php echo $propiedad->wc ?></p>
            </div>
            <div class="card-icon">
                <img src="/public/build/img/icono_estacionamiento.svg" alt="Estacionamiento">
                <p><?php echo $propiedad->estacionamientos ?></p>
            </div>
        </div>
        <p><?php echo $propiedad->descripcion ?></p>
    </div>

    <a href="/propiedades" class="button button-green">Ver otras Propiedades</a>
    
</main>