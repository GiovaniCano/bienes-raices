<?php foreach($entradas as $entrada): ?>
<article>
    <a href="/blog/entrada/<?php echo $entrada->id ?>" class="blog-post">
        <img src="/public/user-images/blog/<?php echo $entrada->imagen ?>" alt="Imagen Blog">
        <div>
            <h3><?php echo $entrada->titulo ?></h3>
            <p class="post-meta">Escrito el: <span><?php echo $entrada->fecha ?></span> por: <span><?php echo $entrada->getAutor($entrada->autorId) ?></span></p>
            <p><?php echo limitString($entrada->contenido, 2) ?></p>
        </div>
    </a>
</article>
<?php endforeach; ?>