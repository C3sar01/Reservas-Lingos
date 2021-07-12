<?php

require_once "../controladores/reserva.controlador.php";
require_once "../modelos/reserva.modelo.php";

class AjaxReservas{

	public $idSala;

	public function ajaxTraerReserva(){

		$valor = $this->idSala;

		$respuesta = ControladorReserva::ctrMostrarReserva($valor);

		echo json_encode($respuesta); 


	}


}

if(isset($_POST["idSala"])){

	$idSala = new AjaxReservas();
	$idSala -> idSala = $_POST["idSala"];
	$idSala -> ajaxTraerReserva();



}