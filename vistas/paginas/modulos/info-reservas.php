<?php

if (isset($_POST["id-sala"])) {
	
	$valor = $_POST["id-sala"];

	$reserva = ControladorReserva::ctrMostrarReserva($valor);
} else {
	echo '<script> window.location="' . $ruta . '"</script>';
}

?>

<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idSala="<?php echo $_POST["id-sala"];  ?>" fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" fechaSalida="<?php echo $_POST["fecha-salida"];  ?>">

	<div class="container">

		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->

			<div class="col-12 col-lg-8 colIzqReservas p-0">

				<!--=====================================
				CABECERA RESERVAS
				======================================-->

				<div class="pt-4 cabeceraReservas">

					<a href="<?php echo $ruta;  ?>habitaciones" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>

					<h6 class="float-right px-3">

						<br>
						<a href="<?php echo $ruta;  ?>perfil" style="color:#FFCC29">Ver tus reservas</a>

					</h6>

					<div class="clearfix"></div>

				</div>

				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white p-4 calendarioReservas">

					<?php if ($valor == $_POST["ruta"]) : ?>

						<h1 class="pb-5 float-left">¡Está Disponible!</h1>

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

					<form action="<?php echo $ruta;  ?>reservas" method="post">

						<input type="hidden" name="id-sala" value="<?php echo $_POST["id-sala"]; ?>">

						<input type="hidden" name="ruta" value="<?php echo $_POST["ruta"]; ?>">

						<div class="container mb-3">

							<div class="row py-2" style="background:#509CC3">

								<div class="col-6 col-md-3 input-group pr-1">

									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" value="<?php echo $_POST["fecha-ingreso"]; ?>" required>

									<div class="input-group-append">

										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

									</div>

								</div>

								<div class="col-6 col-md-3 input-group pl-1">

									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida" value="<?php echo $_POST["fecha-salida"]; ?>" required>

									<div class="input-group-append">

										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

									</div>

								</div>

								<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">

									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">


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
				<h2 class="colorTitulos"><strong>K2DRESF34</strong></h2>

				<div class="form-group">
					<label>Ingreso:</label>
					<input type="date" class="form-control" value="2019-03-13" readonly>
				</div>

				<div class="form-group">
					<label>Salida:</label>
					<input type="date" class="form-control" value="2019-03-15" readonly>
				</div>

				<div class="form-group">
					<label>Sala:</label>
					<input type="text" class="form-control" value="Habitación Suite Oriental" readonly>

					<img src="img/oriental.png" class="img-fluid">

				</div>

				<div class="form-group">
					<label>Plan:</label>
					<select class="form-control">

						<option value="continental">Plan Continental</option>
						<option value="americano">Plan Americano</option>
						<option value="romantico">Plan Romántico</option>
						<option value="lunademiel">Plan Luna de Miel</option>
						<option value="aventura">Plan Aventura</option>
						<option value="spa">Plan SPA</option>

					</select>
				</div>

				<div class="form-group">
					<label>Personas:</label>
					<select class="form-control">

						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>

					</select>
				</div>

				<div class="row py-4">

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">

						<h1>$300 USD</h1>

					</div>

					<div class="col-12 col-lg-6 col-xl-5">

						<a href="<?php echo $ruta;  ?>perfil">
							<button class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
						</a>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>