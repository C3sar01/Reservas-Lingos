<?php

require_once "../controladores/reserva.controlador.php";
require_once "../modelos/reserva.modelo.php";

class AjaxReservas{
	/*==========================================
	Traer la reserva de Sala
	============================================*/

	public $idSala;

	public function ajaxTraerReserva(){

		$valor = $this->idSala;

		$respuesta = ControladorReserva::ctrMostrarReserva($valor);

		echo json_encode($respuesta); 


	}

	/*==========================================
	Traer la reserva con código de reserva
	============================================*/

	public $codigoReserva;

	public function ajaxTraerCodigoReserva(){

		$valor = $this->codigoReserva;

		$respuesta = ControladorReserva::ctrMostrarCodigoReserva($valor);

		echo json_encode($respuesta); 


	}


}
/*==========================================
	Traer la reserva de Sala
============================================*/
if(isset($_POST["idSala"])){

	$idSala = new AjaxReservas();
	$idSala -> idSala = $_POST["idSala"];
	$idSala -> ajaxTraerReserva();



}

/*==========================================
	Traer la reserva con código de reserva
============================================*/
if(isset($_POST["codigoReserva"])){

	$codigoReserva = new AjaxReservas();
	$codigoReserva -> codigoReserva = $_POST["codigoReserva"];
	$codigoReserva -> ajaxTraerCodigoReserva();



}