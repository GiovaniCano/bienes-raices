<?php foreach($propiedades as $propiedad): ?>
<div class="card">
	<img src="/public/user-images/propiedades/<?php echo $propiedad->imagen ?>" alt="Imagen de Propiedad" loading="lazy">
	<div class="card-info">
		<h3><?php echo $propiedad->titulo ?></h3>
		<p><?php echo limitString($propiedad->descripcion, 1) ?></p>
		<div class="card-bottom">
			<p class="card-price">$ <?php echo $propiedad->precio ?></p>
			<div class="card-icons">
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
			<a href="/propiedades/propiedad/<?php echo $propiedad->id ?>" class="button button-orange button-100w">Ver Propiedad</a>
		</div>
	</div>
</div>
<?php endforeach; ?>