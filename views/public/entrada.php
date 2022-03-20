<main class="container centered">
    <h1><?php echo $entrada->titulo ?></h1>

    <img src="/public/user-images/blog/<?php echo $entrada->imagen ?>" alt="Imagen">
    
    <p class="post-meta">Escrito el: <span><?php echo $entrada->fecha ?></span> por: <span><?php echo $entrada->getAutor($entrada->autorId) ?></span></p>
    <div>
        <p><?php echo $entrada->contenido ?></p>
    </div>

    <a href="/blog" class="button button-green">Ver otras Publicaciones</a>
</main>