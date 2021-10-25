<?php

if (isset($_POST["id-sala"])) {

	$valor = $_POST["id-sala"];
	echo '<pre class=bg-white>';
	print_r($valor);
	echo '</pre>';
	$reserva = ControladorReserva::ctrMostrarReserva($valor);

	$indice = 0;

	if (!$reserva) {

		$valor = $_POST["ruta"];

		$reserva = ControladorSalas::ctrMostrarSalas($valor);

		foreach ($reserva as $key => $value) {

			if ($value["id_s"] == $_POST["id-sala"]) {

				$indice = $key;
			}
		}
	}
	/*=============================================
    SELECCIONAR VALORES
    =============================================*/
	date_default_timezone_set("America/Santiago");

	$hora = getdate();
	$plan16 = $reserva[$indice]["plan16"];
	$plan32 = $reserva[$indice]["plan32"];
	$plan64 = $reserva[$indice]["plan64"];
	$planes = $plan16 ; $plan32 ; $plan64;
	$precioHora = [];

	/*=============================================
    CONDICIÓN DE VALOR DESPUÉS DE LAS 16:00HRS
    =============================================*/

	if ($hora["hours"] >= 16 && $hora["hours"] <= 20) {

		$precioHora = $reserva[$indice]["hora_alta"];
	} else {

		$precioHora = $reserva[$indice]["hora_alta"];
	}

	/*=============================================
    CALCULAR CANTIDAD DE HORAS POR RESERVA
    =============================================*/
	$horaIngreso = new DateTime($_POST["fecha-ingreso"]);
	$horaSalida = new DateTime($_POST["fecha-salida"]);
	$diff = $horaIngreso->diff($horaSalida);
	$horas = $diff->h;

	if ($horas == 0) {
		$horas = 1;
	}
} else {
	echo '<script> window.location="' . $ruta . '"</script>';
}

?>

<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idSala="<?php echo $_POST["id-sala"]; ?>" 
fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" 
fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" horas="<?php echo $horas; ?>">

	<div class="container">

		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->

			<div class="col-12 col-lg-8 colIzqReservas p-0">

				<!--=====================================
				CABECERA RESERVAS
				======================================-->

				<<div class="pt-4 cabeceraReservas">

					<a href="javascript:history.back()" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>

					<h6 class="float-right px-3">

						<?php if (isset($_SESSION["validarSesion"])) : ?>

							<?php if ($_SESSION["validarSesion"] == "ok") : ?>

								<br>
								<a href="<?php echo $ruta; ?>perfil" style="color:white">Ver tus reservas</a>

							<?php endif ?>

						<?php else : ?>

							<br>
							<a href="#modalIngreso" data-toggle="modal" style="color:#FFCC29">Ver tus reservas</a>

						<?php endif ?>

					</h6>

					<div class="clearfix"></div>

			</div>

			<!--=====================================
				CALENDARIO RESERVAS
			======================================	-->

			<div class="bg-white p-4 calendarioReservas">

				<?php if ($valor == $_POST["ruta"]) : ?>

					<h1 class="pb-5 float-left">¡La sala se encuentra disponible!</h1>

				<?php else : ?>

					<div class="infoDisponibilidad"></div>

				<?php endif ?>

				<div class="float-right pb-3">

					<ul>
						<li>
							<i class="fas fa-square-full" style="color:#847059"></i> No disponible
						</li>

						<li>
							<i class="fas fa-square-full" style="color:#eee"></i> Disponible
						</li>

						<li>
							<i class="fas fa-square-full" style="color:#FFCC29"></i> Tu reserva
						</li>
					</ul>

				</div>

				<div class="clearfix"></div>

				<div id="calendar"></div>

				<!--=====================================
					MODIFICAR FECHAS
				======================================	-->

				<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

				<form action="<?php echo $ruta; ?>reservas" method="post">

					<input type="hidden" name="id-sala" value="<?php echo $_POST["id-sala"]; ?>">
					<input type="hidden" name="ruta" value="<?php echo $_POST["ruta"]; ?>">




					<div class="container mb-3">

						<div class="row py-2" style="background:#509CC3">

							<div class="col-6 col-md-3 input-group pr-1">

								<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" 
								name="fecha-ingreso" 
								value="<?php echo $_POST["fecha-ingreso"]; ?>" 
								required>

								<div class="input-group-append">

									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

								</div>

							</div>

							<div class="col-6 col-md-3 input-group pl-1">

								<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" 
								name="fecha-salida" 
								value="<?php echo $_POST["fecha-salida"]; ?>" 
								readonly required>

								<div class="input-group-append">

									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

								</div>

							</div>

							<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">

								<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" 
								style="background:black">
							</div>

						</div>

					</div>

			</div>

		</div>

		<!--=====================================
			BLOQUE DER
		======================================-->

		<div class="col-12 col-lg-4 colDerReservas" style="display:none">

			<h4 class="mt-lg-5">Código de la Reserva:</h4>
			<h2 class="colorTitulos"><strong class="codigoReserva"></strong></h2>

			<div class="form-group">
				<label>Ingreso:</label>
				<input type="text" class="form-control" value="<?php echo $_POST["fecha-ingreso"]; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Salida:</label>
				<input type="text" class="form-control" value="<?php echo $_POST["fecha-salida"]; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Sala:</label>
				<input type="text" class="form-control" value="Sala <?php echo $reserva[$indice]["tipo"] . " " . 
				$reserva[$indice]["estilo"]; ?>" readonly>
				<br>
				<?php

				$galeria = json_decode($reserva[$indice]["galeria"], true);

				?>

				<img src="<?php echo $servidor . $galeria[0]; ?>" class="img-fluid">

				<!-- ESCENARIO 2 Y 3 DE RESERVAS -->
				<input type="text" class="form-control tituloReserva" value="" readonly>

			</div>

			<div class="form-group valores">
             
			<div img="" style="padding:10px" >
				
			    <h4>
					
				    <a href="#infoPlanes" data-toggle="modal">
					<img src="img/planes.png" class="img-fluid menuPlanes" alt="Planes">
				    </a>
			    
				</h4>
			
			</div>
			
			<br>
			<button type="button" class="btn btn-dark float-right comprarPlan">Comprar un plan</button>
			<br>
			
			<br><select class="form-control elegirPlan">
			

					<option value="" disabled>Selecciona aquí tu plan</option>
					<option id="16" value="<?php echo ($plan16) ?>,plan16">Plan 16 horas por mes <?php echo number_format($plan16) ?></option>
					<option id="32" value="<?php echo ($plan32) ?>,plan32">Plan 32 horas por mes <?php echo number_format($plan32) ?></option>
					<option id="64" value="<?php echo ($plan64) ?>,plan64">Plan 64 horas por mes <?php echo number_format($plan64) ?></option>

				</select>

			</div>


			<div class="row py-4">

				<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">

					<h1 class="precioReserva">$<span><?php echo number_format($precioHora * $horas); ?></span><br>CLP</h1>

				</div>

				<div class="col-12 col-lg-6 col-xl-5">

					<?php if (isset($_SESSION["validarSesion"])) : ?>

						<?php if ($_SESSION["validarSesion"] == "ok") : ?>

							<a href="<?php echo $ruta; ?>perfil" 
							class="pagarReserva" 
							idSala="<?php echo $reserva[$indice]["id_s"]; ?>" 
							imgSala="<?php echo $servidor . $galeria[0]; ?>" 
							infoSala="Sala <?php echo $reserva[$indice]["tipo"] . " " . 
							$reserva[$indice]["estilo"]; ?>" 
							
							pagoReserva="<?php echo ($precioHora * $horas); ?>" 
							pagoPlan="<?php echo number_format($precioHora * $horas); ?>" 
							codigoReserva="" 
							fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" 
							fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" 
							horas="Precio Hora" 
							plan="plan16">




								<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
							</a>

						<?php endif ?>

					<?php else : ?>

						<a href="#modalIngreso" data-toggle="modal" class="pagarReserva" 
						idSala="<?php echo $reserva[$indice]["id_s"]; ?>" 
						imgSala="<?php echo $servidor . $galeria[0]; ?>" 
						infoSala="Sala <?php echo $reserva[$indice]["tipo"] . " " . $reserva[$indice]["estilo"]; ?>" 
						pagoReserva="<?php echo ($precioHora * $horas); ?>" 
						pagoPlan="<?php echo number_format($precioHora * $horas); ?>" 
						codigoReserva="" 
						fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" 
						fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" 
						horas="Precio Hora" plan="Precio plan">
							
						<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
						</a>

					<?php endif ?>

				</div>

			</div>

		</div>


	</div>

</div>

</div>

<!--=====================================
VENTANA MODAL PLANES
======================================-->

<div class="modal" id="infoPlanes">
	
	 <div class="modal-dialog modal-lg">
			
		<div class="modal-content">

			<div class="modal-header">
	        	<h4 class="modal-title text-uppercase">
					Salas : <?php echo $reserva[$indice]["tipo"].' '.$reserva[$indice]["estilo"]; ?></h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>

	      	<div class="modal-body">

				<figure class="text-center">

       				<img src="<?php echo $servidor.$galeria[$indice]; ?>" class="img-fluid">

       			</figure>

				<p class="px-2"><?php echo $reserva[$indice]["descripcion_s"]; ?></p>

				<hr>

	      	</div>

			  <h4 class="text-center">Al comprar cualquiera de los 3 planes disponibles, estas horas pueden ser utilizadas a lo largo del mes como se estime conveniente</h4>

	      	<div class="modal-footer">

			  
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      		</div>

		</div>

	</div>

</div>