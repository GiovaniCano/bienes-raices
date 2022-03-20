<main class="container">
	<h2>Más Sobre Nosotros</h2>
	<div class="section-nosotros">
		<div class="icon-nosotros">
			<img src="/public/build/img/icono1.svg" alt="Ícono Seguridad">
			<h3>Seguridad</h3>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis veniam voluptatibus, rerum unde perferendis vel aliquid id itaque quia libero consectetur maiores obcaecati voluptate mollitia sapiente animi! Nam, illo deserunt.</p>
		</div>
		<div class="icon-nosotros">
			<img src="/public/build/img/icono2.svg" alt="Ícono Precio">
			<h3>Precio</h3>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis veniam voluptatibus, rerum unde perferendis vel aliquid id itaque quia libero consectetur maiores obcaecati voluptate mollitia sapiente animi! Nam, illo deserunt.</p>
		</div>
		<div class="icon-nosotros">
			<img src="/public/build/img/icono3.svg" alt="Ícono Tiempo">
			<h3>Tiempo</h3>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis veniam voluptatibus, rerum unde perferendis vel aliquid id itaque quia libero consectetur maiores obcaecati voluptate mollitia sapiente animi! Nam, illo deserunt.</p>
		</div>
	</div>
</main>

<section class="container">
	<h2>Propiedades en Venta</h2>

	<div class="section-propiedades">
		<?php require 'templates/propiedades-cards.php' ?>
	</div>

	<a href="/propiedades" class="button button-green   button-ver-todas">Ver Todas</a>
</section>

<section class="contacto-bg">
	<div class="container">
		<h2>Encuentra la Casa de tus Sueños</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui assumenda nesciunt a et ex.</p>
		<a href="/contacto" class="button button-orange  ">Contáctanos</a>
	</div>
</section>

<div class="container section-blog-testimoniales">
	<section class="blog">
		<h2>Nuestro Blog</h2>
		
		<div class="blog-posts">
			<?php require 'templates/blog-cards.php' ?>
			<a href="/blog" class="button button-green  ">Ver Blog</a>
		</div>

	</section>
	<!--  -->
	<section class="section-testimoniales">
		<h2>Testimoniales</h2>
		<div class="testimoniales">
			<div class="testimonial">
				<img src="/public/build/img/comilla.svg">
				<div>
					<blockquote>Obcaecati rem autem consequuntur cum. Impedit odit, nihil error quae dicta ex iusto inventore voluptates cupiditate.</blockquote>
					<p>- Victoria Herranz</p>
				</div>
			</div> <!--.testimonial -->
			<div class="testimonial">
				<img src="/public/build/img/comilla.svg">
				<div>
					<blockquote>Perferendis deleniti poro quam sunt exercitationem amet, sint eaque accusantium, enim rror quis.</blockquote>
					<p>- Omar Ramirez</p>
				</div>
			</div> <!--.testimonial -->
		</div>
	</section>
</div>

<div class="demo-alert">
	<img class="x-close" src="public/build/img/x.svg" alt="X">
	<div>
		<p>Mensaje de sitio demostrativo:</p>
		<p>
			Puedes visitar " <a href="/login">/login</a> " para crear y editar contenido de esta web.
		</p>
	</div>
</div>