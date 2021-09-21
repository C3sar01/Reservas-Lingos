<?php

$cafe = ControladorCafe::ctrMostrarCafe();



?>

<!--=====================================
CAFÉ
======================================-->

<div class="fondoRestaurante container-fluid">


</div>

<div class="restaurante container-fluid pt-5" id="restaurante">
	
	<div class="container">

		<div class="grid-container">
		
			<div class="grid-item carta">
				
				<div class="row p-1 p-lg-5">

					<?php foreach ($cafe as $key => $value): ?>

						<div class="col-6 col-md-4 text-center p-1">
						
						<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid w-50 rounded-circle">

						<p class="py-2"><?php echo $value["descripcion"]; ?></p>

					</div>
						
					<?php endforeach ?>
					

					<div class="col-12 text-center d-block d-lg-none">
					
						<button class="btn btn-warning text-uppercase mb-5 volverCarta">Volver</button>

					</div>
					
				</div>

			</div>

			<div class="grid-item bloqueRestaurante">
				
			   <h9>
			   <a href="<?php echo $ruta;  ?>">

               <img src="img/logokaffe.png" class="img-fluid kaffe" >

                </a>
				</h9>

				<p class="p-4 my-lg-5">DISFRUTA DE UN COFFE BREAK EN EL PRIMER PISO DEL LOCAL EN CAFÉ KAFFE, DONDE TE OFRECEMOS CAFÉ DE GRANO FRESCO Y LOS MEJORES PRODUCTOS PARA ACOMPAÑAR TU EXQUISITO CAFÉ Y TU TARDE DE TRABAJO</p>

				<button class="btn btn-warning text-uppercase mb-5 verCarta">Ver la carta</button>

			</div>
			
		</div>		

	</div>

</div>