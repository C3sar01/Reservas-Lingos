<?php

$item = "id_u";
$valor = $_SESSION["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
$reservas = ControladorReserva::ctrMostrarReservasUsuario($valor);

$hoy = date("Y-m-d");
$noVencidas = 0;
$vencidas = 0;

foreach ($reservas as $key => $value) {

	if ($hoy >= $value["fecha_ingreso"]) {

		++$vencidas;
	} else {

		++$noVencidas;
	}
}

?>



<!--=====================================
INFO PERFIL
======================================-->

<div class="infoPerfil container-fluid bg-white p-0 pb-5 mb-5">

	<div class="container">

		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->

			<div class="col-12 col-lg-4 colIzqPerfil p-0 px-lg-3">

				<div class="cabeceraPerfil pt-4">

					<?php if ($usuario["modo"] == "facebook") : ?>

						<a href="#" class="float-left lead text-white pt-1 px-3 mb-4 salir">
							<h5><i class="fas fa-chevron-left"></i> Cerrar sesión</h5>
						</a>

					<?php else : ?>

						<a href="<?php echo $ruta; ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">
							<h5><i class="fas fa-chevron-left"></i> Cerrar sesión</h5>
						</a>

					<?php endif ?>



					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">

					<figure class="text-center imgPerfil">

						<?php if ($usuario["foto"] == "") : ?>

							<img src="<?php echo $servidor; ?>vistas/img/usuarios/default/default.png" class="img-fluid rounded-circle">

						<?php else : ?>

							<?php if ($usuario["modo"] == "directo") : ?>

								<img src="<?php echo $servidor . $usuario["foto"]; ?>" class="img-fluid rounded-circle">

							<?php else : ?>

								<img src="<?php echo $usuario["foto"]; ?>" class="img-fluid rounded-circle">

							<?php endif ?>

						<?php endif ?>

					</figure>

					<div id="accordion">

						<div class="card">

							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									MIS RESERVAS
								</a>
							</div>

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								<ul class="card-body p-0">

									<li class="px-2 misReservas" style="background:#FFFDF4"> <?php echo $noVencidas; ?>
										Por vencerse</li>

									<li class="px-2 text-white misReservas" style="background:#CEC5B6">
										<?php echo $vencidas; ?> vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->

								<?php

								if (!$reservas) {

									echo ' <div class="d-lg-none d-flex py-2">Aún no tiene reservas realizadas</div>';

									return;
								}


								foreach ($reservas as $key => $value) {

									$sala = ControladorSalas::ctrMostrarSala($value["id_salas"]);
									$categoria = ControladorCategorias::ctrMostrarCategoria($sala["tipo_s"]);


									echo '<div class="d-lg-none d-flex py-2">
									
												<div class="p-2 flex-grow-1">

													<h5>' . $sala["estilo"] . '</h5>
													<h5 class="small text-gray-dark">Del ' . $value["fecha_ingreso"] . ' al ' .
										$value["fecha_salida"] . '</h5>

												</div>

												<div class="p-2">

												</div>

											</div>

											<hr class="my-0">';
								}

								?>

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">

										<li class="list-group-item small"><?php echo $usuario["nombre"]; ?></li>
										<li class="list-group-item small"><?php echo $usuario["email"]; ?></li>

										<?php if ($usuario["modo"] == "directo") : ?>

											<li class="list-group-item small">

												<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#cambiarPassword">Cambiar Contraseña</button>

											</li>

											<!--=====================================
                                              VENTANA PARA CAMBIAR CONTRASEÑA
                                             ======================================-->

											<div class="modal formulario" id="cambiarPassword">

												<div class="modal-dialog">

													<div class="modal-content">

														<form method="post">

															<div class="modal-header">

																<h4 class="modal-title">Cambiar Contraseña</h4>

																<button type="button" class="close" data-dismiss="modal">&times;</button>

															</div>

															<div class="modal-body">

																<input type="hidden" name="idUsuarioPassword" value="<?php echo $usuario["id_u"]; ?>">

																<div class="form-group">

																	<input type="password" class="form-control" placeholder="Nueva contraseña" name="editarPassword" required>

																</div>

															</div>

															<div class="modal-footer d-flex justify-content-between">

																<div>

																	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

																</div>

																<div>

																	<button type="submit" class="btn btn-primary">Enviar</button>

																</div>

															</div>

															<?php

															$cambiarPassword = new ControladorUsuarios();
															$cambiarPassword->ctrCambiarPassword();

															?>

														</form>

													</div>

												</div>

											</div>

										<?php endif ?>

										<li class="list-group-item small">
											<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cambiarFotoPerfil">Cambiar Imagen</button>
										</li>

										<!--=====================================
										VENTANA PARA CAMBIAR FOTO DE PERFIL
										======================================-->

										<div class="modal formulario" id="cambiarFotoPerfil">

											<div class="modal-dialog">

												<div class="modal-content">

													<form method="post" enctype="multipart/form-data">

														<div class="modal-header">

															<h4 class="modal-title">Cambiar Imagen</h4>

															<button type="button" class="close" data-dismiss="modal">&times;</button>

														</div>

														<div class="modal-body">

															<input type="hidden" name="idUsuarioFoto" value="<?php echo $usuario["id_u"]; ?>">

															<div class="form-group">

																<input type="file" class="form-control-file border" name="cambiarImagen" required>

																<input type="hidden" name="fotoActual" value="<?php echo $usuario["foto"]; ?>">

															</div>

														</div>

														<div class="modal-footer d-flex justify-content-between">

															<div>

																<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

															</div>

															<div>

																<button type="submit" class="btn btn-primary">Enviar</button>

															</div>

														</div>

														<?php

														$cambiarImagen = new ControladorUsuarios();
														$cambiarImagen->ctrCambiarFotoPerfil();


														?>

													</form>

												</div>

											</div>

										</div>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-8 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">

						<h4 class="float-left">Hola <?php echo $usuario["nombre"]; ?></h4>

					</div>
					<!--=====================================
			            Mercado Pago
			         ======================================-->

					<div class="col-12">


						<?php if (isset($_COOKIE["codigoReserva"])) : ?>

							<?php

							$validarPagoReserva = false;

							$hoy = date("Y-m-d");
							if ($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]) {

								echo '<div class= "alert alert-danger">Lo sentimos, las fechas de la reserva no pueden ser igual o 
								inferiores al dia de hoy,
							        vuelve a intentarlo</div>';

								$validarPagoReserva = false;
							} else {

								$validarPagoReserva = true;
							}

							/*--=====================================
                                      Cruce de fechas
                              ======================================*/

							$valor = $_COOKIE["idSala"];

							$validarReserva = ControladorReserva::ctrMostrarReserva($valor);

							$opcion1 = array();
							$opcion2 = array();
							$opcion3 = array();

							if ($validarReserva != 0) {

								foreach ($validarReserva as $key => $value) {

									/*=====================================
                                       Validar opción 1 de cruce de fechas
                                     ======================================*/

									if ($_COOKIE["fechaIngreso"] == $value["fecha_ingreso"]) {

										array_push($opcion1, false);
									} else {

										array_push($opcion1, true);
									}

									/*=====================================
                                        Validar opción 2 de cruce de fechas
                                        ======================================*/

									if (
										$_COOKIE["fechaIngreso"] > $value["fecha_ingreso"]
										&& $_COOKIE["fechaIngreso"] < $value["fecha_salida"]
									) {

										array_push($opcion2, false);
									} else {

										array_push($opcion2, true);
									}

									/*=====================================
                                    Validar opción 3 de cruce de fechas
                                     ======================================*/

									if (
										$_COOKIE["fechaIngreso"] < $value["fecha_ingreso"]
										&& $_COOKIE["fechaSalida"] > $value["fecha_ingreso"]
									) {

										array_push($opcion3, false);
									} else {

										array_push($opcion3, true);
									}

									if ($opcion1[$key] == false || $opcion2[$key] == false || $opcion3[$key] == false) {

										$validarPagoReserva = false;

										echo 'Lo sentimos, las fechas de la reserva que habías seleccionado han sido ocupadas
									      <a href="' . $ruta . '" class="btn btn-danger btn-sm">
										  Vuelve a intentarlo</a>';

										break;
									} else {

										$validarPagoReserva = true;
									}
								}
							}

							?>

							<?php if ($validarPagoReserva) : ?>


								<div class="card">
									<div class="card-header">

										<h4>Tienes una reserva pendiente por pagar:</h4>
									</div>

									<div class="card-body text-center">
										<figure>
											<img src="<?php echo $_COOKIE["imgSala"]; ?>" alt="Sala reservada" class="img-thumbnail w-50">
										</figure>

										<h5><strong><?php echo $_COOKIE["infoSala"]; ?></strong></h5>

										<h6>Ingreso : <?php echo $_COOKIE["fechaIngreso"]; ?>
											- Salida <?php echo $_COOKIE["fechaSalida"]; ?></h6>

										<h4>$<?php echo number_format($_COOKIE["pagoReserva"]); ?></h4>

									</div>
									<div class="card-footer d-flex">
										<figure>
											<img src="img/mercadopago.png" class="img-fluid w-50" alt="Logo Mercado Pago">
										</figure>

										<form action="<?php echo $ruta . 'perfil'; ?>" method="POST" class="pt-4">
											<script 
											src="https://www.mercadopago.cl/integrations/v1/web-tokenize-checkout.js" 
											data-public-key="TEST-34516dc2-8177-40e6-94fe-68534521386b" 
											data-transaction-amount="<?php echo $_COOKIE["pagoReserva"]; ?>" 
											data-button-label="Pagar" 
											data-summary-product-label="<?php echo $_COOKIE["infoSala"]; ?>" 
											data-summary-product="<?php echo $_COOKIE["pagoReserva"]; ?>">

											</script>
										</form>
									</div>

								</div>




								<?php
								if (isset($_REQUEST["token"])) {
									$token = $_REQUEST["token"];
									$payment_method_id = $_REQUEST["payment_method_id"];
									$installments = $_REQUEST["installments"];
									$issuer_id = $_REQUEST["issuer_id"];

									MercadoPago\SDK::setAccessToken("TEST-4404288869112398-072802-aa167f4fe5c00f1dec03f666c6f74a04-268867485");
									//...
									$payment = new MercadoPago\Payment();
									$payment->transaction_amount = $_COOKIE["pagoReserva"];
									$payment->token = $token;
									$payment->description = $_COOKIE["infoSala"];
									$payment->installments = $installments;
									$payment->payment_method_id = $payment_method_id;
									$payment->issuer_id = $issuer_id;
									$payment->payer = array(
										"email" => "john@yourdomain.com",
									);

									$payment->save();

									if ($payment->status == "approved") {

										$datos = array(

											"id_salas" => $_COOKIE["idSala"],
											"id_usuario" => $usuario["id_u"],
											"pago_reserva" => $_COOKIE["pagoReserva"],
											"numero_transaccion" => $payment->id,
											"codigo_reserva" => $_COOKIE["codigoReserva"],
											"descripcion_reserva" => $_COOKIE["infoSala"],
											"fecha_ingreso" => $_COOKIE["fechaIngreso"],
											"fecha_salida" => $_COOKIE["fechaSalida"],
										);

										$respuesta = ControladorReserva::ctrGuardarReserva($datos);

										if ($respuesta == "ok") {

											echo '<script>

									document.cookie = "idSala=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "imgSala=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "infoSala=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "pagoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "codigoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "fechaIngreso=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";
									document.cookie = "fechaSalida=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' . $ruta . ';";

									swal({
										type:"success",
										title: "¡CORRECTO!",
										text: "¡La reserva ha sido creada con éxito!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"

									}).then(function(result){

											if(result.value){
												history.back();
											  }
									});

									  </script>';
										}
									} else {
										echo '<h1>Algo salió mal!</h1>
									  <p>Ha ocurrido un error con el pago. Por favor vuelve a intentarlo.</p>';
									}
								}

								?>
							<?php endif ?>
						<?php endif ?>

					</div>

					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Código</th>
									<th>Nombre de Sala</th>
									<th>Fecha de Ingreso</th>
									<th>Fecha de Salida</th>

								</tr>
							</thead>
							<tbody>
								<?php

								if (!$reservas) {

									echo ' <tr><td colspan="5">Aún no tiene reservas realizadas</td></tr>';

									return;
								} else {

									foreach ($reservas as $key => $value) {

										$sala = ControladorSalas::ctrMostrarSala($value["id_salas"]);
										$categoria = ControladorCategorias::ctrMostrarCategoria($sala["tipo_s"]);


										if ($value["fecha_ingreso"] != "0000-00-00") {

											echo '<tr>

							     		<td>' . ($key + 1) . '</td>
							     		<td>' . $value["codigo_reserva"] . '</td>
							     		<td class="text-uppercase">' . $sala["estilo"] . '</td>
							     		<td>' . $value["fecha_ingreso"] . '</td>
							     		<td>' . $value["fecha_salida"] . '</td>
							 	
							            </tr>';
										}
									}

									echo '<p class="help-block small">

							Si necesita modificar o cancelar una reserva, favor escribirnos al WhatsApp 
							<a href="https://api.whatsapp.com/send?phone=562 2 7171203&text=
							Hola Lingos Talca, necesito hacer un cambio en una reserva" target="_blank">+562 2 7171203</a>

					     </p>';
								}



								?>
							</tbody>
						</table>


					</div>

				</div>

			</div>

		</div>

	</div>

</div>