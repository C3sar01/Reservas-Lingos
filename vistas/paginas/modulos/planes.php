<?php

$planes = ControladorPlanes::ctrMostrarPlanes();



?>

<!--=====================================
PLANES
======================================-->

<div class="planes container-fluid bg-white p-0" id="planes">
	
	<div class="container p-0">
		
		<div class="grid-container">
			
			<div class="grid-item">
				
				<h1 class="text-center py-3 py-lg-5 tituloPlan text-uppercase" tituloPlan="BIENVENIDO">BIENVENIDO</h1>

				<p class="text-muted text-left px-4 descripcionPlan text-uppercase" descripcionPlan=" Lingo's es un espacio de trabajo y aprendizaje que permite tanto a profesionales independientes como a empresas virtuales, contar con un espacio físico para el desarrollo de diversas actividades.
Ofrecemos espacios equipados -data, escritorios, mesas, pizarras- para talleres, salas de reunión u oficinas según los requerimientos de nuestros clientes. Además ofrecemos el servicio de coffe break que entrega Kaffe Café ubicado en el primer nivel.

 
¿Quieres saber más sobre nuestros servicios? Contactanos! "></p>

			</div>



			<?php foreach ($planes as $key => $value): ?>

				<div class="grid-item d-none d-lg-block" data-toggle="modal" data-target="#modalPlanes">
				
				<figure class="text-center">
					
					<h1 descripcion="<?php echo $value["descripcion"]; ?>" class= "text-uppercase" > <?php echo $value["tipo"]; ?></h1>

				</figure>

				<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid" width="100%">


			</div>
				
			<?php endforeach ?>

			
		</div>

	</div>

</div>
