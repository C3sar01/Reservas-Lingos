<!--=====================================
CONTÁCTENOS
======================================-->

<div class="contactenos container-fluid bg-white py-4" id="contactenos">
	
	<div class="container text-center">
		
		<h1 class="py-sm-4">CONTÁCTENOS</h1>

		<form method="post">

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Nombre" name="nombreContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Apellido" name="apellidoContactenos" required>

			</div>

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Móvil" name="movilContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Correo Electrónico" name="emailContactenos" required>

			</div>

			<textarea class="form-control" rows="6" placeholder="Escribe aquí tu mensaje" name="mensajeContactenos" required></textarea>

			<button type="submit" class="btn btn-dark my-4 btn-lg py-3 text-uppercase w-50">Enviar</button>
			
			<?php

				$contactenos = new ControladorUsuarios();
				$contactenos -> ctrFormularioContactenos();
			
			?>

		</form>

	</div>

</div>

<!--=====================================
MAPA
======================================-->
<div class="mapa container-fluid bg-white p-0">



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d406.42420291265483!2d-71.66606167171844!3d-35.42027803603942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9665c69e0b83ca8f%3A0x24916097c181d2a9!2sLingo&#39;s!5e0!3m2!1ses-419!2scl!4v1629083006319!5m2!1ses-419!2scl" 
	width="100%" 
	height="450" 
	frameborder="0"
	style="border:0;" 
	allowfullscreen>

</iframe>


	<div class=" p-4 info"> 

		<h3 class="mt-4"><strong>Visítanos!</strong></h3>
	
		<p>
		Lingo's Talca<br>
		1 Poniente 1610, Talca<br>
		
		</p>

		<p class="pb-4">Email: contacto@lingos.cl<br>
		fono +569 99976703</p>

	</div>	

</div>

<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid p-0">

	<div class="grid-container">
			
		<div class="grid-item d-none d-lg-block pt-2"></div>

		<div class="grid-item d-none d-lg-block pt-2">
			
			<p>Siguenos en nuestras redes sociales!</p>

		</div>

		<div class="grid-item pt-2">
			
			<ul class="py-1">

				<li>
					<a href="https://www.facebook.com/lingostalca" target="_blank"><i class="fab fa-facebook-f lead text-white float-left mx-3"></i></a>
				</li>

				
				<li>
					<a href="https://www.instagram.com/lingos.talca/" target="_blank"><i class="fab fa-instagram lead text-white float-left mx-3"></i></a>
				</li>	
			
			</ul>	

		</div>

	</div>

</footer>

<!--=====================================
REDES SOCIALES MÓVIL
======================================-->

<ul class="redesMovil p-2 nav nav-justified">

	<li class="nav-item">
		<a href="#" target="_blank"><i class="fab fa-facebook-f lead text-white"></i></a>
	</li>


	<li class="nav-item">
		<a href="#" target="_blank"><i class="fab fa-instagram lead text-white"></i></a>
	</li>	

</ul>	
