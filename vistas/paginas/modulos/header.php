<?php

$categorias = ControladorCategorias::ctrMostrarCategorias();

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		$item = "id_u";
		$valor = $_SESSION["id"];

		$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	}

}


?>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid p-0 bg-white">

	<div class="container p-0">

		<div class="grid-container py-2">

			<!-- LOGO -->

			<div class="grid-item">

				<a href="<?php echo $ruta;  ?>">

					<img src="img/logoLingos.png" class="img-fluid">

				</a>

			</div>

			<div class="grid-item d-none d-lg-block"></div>

			<!-- CAMPANA Y RESERVA -->

			<div class="grid-item d-none d-lg-block bloqueReservas">

				<div class="py-2 campana-y-reserva mostrarBloqueReservas" modo="abajo">

					<i class="fas fa-calendar-day lead mx-2"></i>

					<i class="fas fa-caret-up lead mx-2 flechaReserva"></i>

				</div>

			<!--=====================================
			FORMULARIO DE RESERVAS
			======================================-->
				<form action="<?php echo $ruta; ?>reservas" method="post">

					<div class="formReservas py-1 py-lg-2 px-4">

						<div class="form-group my-4">

							<select class="form-control form-control-lg selectTipoHabitacion" required>

								<option value="">Tamaño de habitación</option>

								<?php foreach ($categorias as $key => $value) : ?>

									<option value="<?php echo $value["ruta"]; ?>"><?php echo $value["tipo"]; ?></option>

								<?php endforeach ?>

							</select>

						</div>

						<div class="form-group my-4">
							<select class="form-control form-control-lg selectTemaHabitacion" name="id-sala" required>

								<option value="">Temática de habitación</option>

							</select>
						</div>

						<input type="hidden" id="ruta" name="ruta">

						<div class="row">

							<div class="col-6 input-group input-group-lg pr-1">

								<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" required>

								<div class="input-group-append">

									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>

								</div>

							</div>

							<div class="col-6 input-group input-group-lg pl-1">

								<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida" readonly required>

								<div class="input-group-append">

									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>

								</div>

							</div>

						</div>

						<input type="submit" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad">

					</div>

				</form>

			</div>






			<!-- INGRESO DE USUARIOS -->

			<div class="grid-item d-none d-lg-block mt-2">

			<?php if (isset($_SESSION["validarSesion"])): ?>

				<?php if ($_SESSION["validarSesion"] == "ok"): ?>

					<a href="<?php echo $ruta.'perfil'; ?>">

					<?php if ($usuario["foto"] == ""): ?>
					
						<i class="fas fa-user"></i>

					<?php else: ?>

						<?php if ($usuario["modo"] == "directo"): ?>

							<img src="<?php echo $servidor.$usuario["foto"]; ?>" class="img-fluid rounded-circle" style="width:30px">
						
						<?php else: ?>
							
							<img src="<?php echo $usuario["foto"]; ?>" class="img-fluid rounded-circle" style="width:30px">

						<?php endif ?>	

					<?php endif ?>	

					</a>

				<?php endif ?>	

			<?php else: ?>

				<a href="#modalIngreso" data-toggle="modal"><i class="fas fa-user"></i></a>

			<?php endif ?>

				

			</div>

			<div class="grid-item d-none d-lg-block mt-2 ">
			
			 <a class="button fab fa-facebook-f lead d-none d-lg-block float-left "href="https://www.facebook.com/lingostalca" 
			     target="_blank"></a>
			
			 <a class="button fab fa-instagram lead d-none d-lg-block float-left mx-4" href="https://www.instagram.com/lingos.talca/" 
			  target="_blank"></a>

		</div>


			<!-- MENÚ HAMBURGUESA -->

			<div class="grid-item mt-1 mt-sm-3 mt-md-4 mt-lg-2 botonMenu">

				<i class="fas fa-bars"></i>

			</div>

		</div>

		

	</div>

	

</header>

<!--=====================================
MENÚ
======================================-->

<nav class="menu container-fluid p-0">

	<ul class="nav nav-justified py-2">

		<li class="nav-item">
			<a class="nav-link text-white" href="#planes">Planes</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#habitaciones">Salas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#pueblo">Lingo's</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#restaurante">Kaffe</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#contactenos">Contáctenos</a>
		</li>

		

	</ul>


</nav>

<!--=====================================
MENÚ MÓVIL
======================================-->
<div class="menuMovil">

	<div class="row">

		<div class="col-6">

			<a href="#modalIngreso" data-toggle="modal">
				<i class="fas fa-user lead ml-3 mt-4"></i>
			</a>

		</div>

		<div class="col-6">

			<div class="float-right mr-3 mt-3 mr-sm-5 mt-sm-4">

				<span class="border border-info float-left p-1 bg-info text-white idiomaEs">ES</span>
				<span class="border border-info float-left p-1 bg-white text-dark idiomaEn">EN</span>

			</div>

		</div>

	</div>

	<div class="formReservas py-1 py-lg-2 px-4">

		<div class="form-group my-4">
			<select class="form-control form-control-lg selectTipoHabitacion" required>

				<option value="">Tamaño de habitación</option>

				<?php foreach ($categorias as $key => $value) : ?>

					<option value="<?php echo $value["ruta"]; ?>"><?php echo $value["tipo"]; ?></option>

				<?php endforeach ?>

			</select>
		</div>

		<div class="form-group my-4">
			<select class="form-control form-control-lg selectTemaHabitacion" name="id-sala" required>

				<option value="">Temática de habitación</option>

			</select>
		</div>

		<input type="hidden" id="ruta" name="ruta">

		<div class="row">

			<div class="col-6 input-group input-group-lg pr-1">

				<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" required>

				<div class="input-group-append">

					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>

				</div>

			</div>

			<div class="col-6 input-group input-group-lg pl-1">

				<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida" readonly required>

				<div class="input-group-append">

					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>

				</div>

			</div>

		</div>

		<input type="sumbit" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad">

	</div>

	<ul class="nav flex-column mt-4 pl-4 mb-5">

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#planesMovil">Planes</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#habitaciones">Salas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#pueblo">Lingos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#restaurante">Kaffe</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#contactenos">Contáctenos</a>
		</li>

	</ul>

</div>