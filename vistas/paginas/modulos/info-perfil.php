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

					<a href="<?php echo $ruta;  ?>reservas" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-chevron-left"></i> Salir</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">

					<figure class="text-center imgPerfil">

						<img src="img/testimonio01.png" class="img-fluid">

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

									<li class="px-2" style="background:#FFFDF4"> 1 Por vencerse</li>
									<li class="px-2 text-white" style="background:#CEC5B6"> 5 vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->

								<div class="d-lg-none d-flex py-2">

									<div class="p-2 flex-grow-1">

										<h5>Suite Contemporánea</h5>
										<h5 class="small text-gray-dark">Del 30.08.2018 al 03.09.2018</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

								<hr class="my-0">

								<div class="d-lg-none d-flex py-2">

									<div class="p-2 flex-grow-1">

										<h5>Suite Contemporánea</h5>
										<h5 class="small text-gray-dark">Del 30.08.2018 al 03.09.2018</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

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

										<li class="list-group-item small">Juan Guillermo Osorio</li>
										<li class="list-group-item small">juangui@correo.com</li>
										<li class="list-group-item small">
											<button class="btn btn-dark btn-sm">Cambiar Contraseña</button>
										</li>
										<li class="list-group-item small">
											<button class="btn btn-primary btn-lg">Cambiar Imagen</button>
										</li>

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

						<h4 class="float-left">Hola Juan</h4>

					</div>
					<!--=====================================
			            Mercado Pago
			         ======================================-->

					<div class="col-12">



						<form action="<?php echo $ruta . 'perfil'; ?>" method="POST">
							<script src="https://www.mercadopago.cl/integrations/v1/web-tokenize-checkout.js" data-public-key="TEST-34516dc2-8177-40e6-94fe-68534521386b" data-transaction-amount="20000.00">

							</script>
						</form>

						<?php
						if (isset($_REQUEST["token"])) {
							$token = $_REQUEST["token"];
							$payment_method_id = $_REQUEST["payment_method_id"];
							$installments = $_REQUEST["installments"];
							$issuer_id = $_REQUEST["issuer_id"];


							MercadoPago\SDK::setAccessToken("TEST-4404288869112398-072802-aa167f4fe5c00f1dec03f666c6f74a04-268867485");
							//...
							$payment = new MercadoPago\Payment();
							$payment->transaction_amount = 20000.00;
							$payment->token = $token;
							$payment->description = "Sala New York";
							$payment->installments = $installments;
							$payment->payment_method_id = $payment_method_id;
							$payment->issuer_id = $issuer_id;
							$payment->payer = array(
								"email" => "john@yourdomain.com"
							);
							
							$payment->save();
							
							if ($payment->status == "approved"){
								
							}


						}

						?>

					</div>

					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Sala</th>
									<th>Fecha de Ingreso</th>
									<th>Fecha de Salida</th>
									<th>Comentarios</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Suite Contemporánea</td>
									<td>30.08.2018</td>
									<td>03.09.2018</td>
									<td>

										<button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>

									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Especial Caribeña</td>
									<td>30.08.2018</td>
									<td>03.09.2018</td>
									<td>

										<button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>

									</td>
								</tr>

								<tr>
									<td>3</td>
									<td>Suite Clásica</td>
									<td>30.08.2018</td>
									<td>03.09.2018</td>
									<td>

										<button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>

									</td>
								</tr>
							</tbody>
						</table>


					</div>

				</div>

			</div>

		</div>

	</div>

</div>