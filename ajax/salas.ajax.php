<?php

require_once "../controladores/salas.controlador.php";
require_once "../modelos/salas.modelo.php";

class AjaxSalas{

	public $ruta;

	public function ajaxTraerSala(){

		$valor = $this->ruta;

		$respuesta = ControladorSalas::ctrMostrarSalas($valor);

		echo json_encode($respuesta); 


	}


}

if(isset($_POST["ruta"])){

	$ruta = new AjaxSalas();
	$ruta -> ruta = $_POST["ruta"];
	$ruta -> ajaxTraerSala();



}