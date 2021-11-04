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
				
				<h1 class="text-center py-3 py-lg-5 tituloPlan text-uppercase" tituloPlan="Revisa nuestros planes!">BIENVENIDO A LINGO'S!</h1>

				<h5 class="text-muted text-left px-4 descripcionPlan" descripcionPlan

 
¿Quieres saber más sobre nuestros servicios? Contactanos! "></h5>

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
