<?php

class ControladorInicio{

	/*=============================================
	SUMAR VENTAS
	=============================================*/

	static public function ctrSumarVentas(){

		$tabla = "reserva";

		$respuesta = ModeloInicio::mdlSumarVentas($tabla);
		
		return $respuesta;

	}	

	/*=============================================
	MEJOR HABITACIÓN
	=============================================*/

	static public function ctrMejorHabitacion(){

		$tabla = "reserva";

		$respuesta = ModeloInicio::mdlMejorHabitacion($tabla);
		
		return $respuesta;

	}	

	/*=============================================
	PEOR HABITACIÓN
	=============================================*/

	static public function ctrPeorHabitacion(){

		$tabla = "reserva";

		$respuesta = ModeloInicio::mdlPeorHabitacion($tabla);
		
		return $respuesta;

	}	

	/*=============================================
	TRAER FOTO HABITACIÓN
	=============================================*/

	static public function ctrTraerFotoHabitacion($valor){

		$tabla1 = "reserva";
		$tabla2 = "salas";

		$respuesta = ModeloInicio::mdlTraerFotoHabitacion($tabla1, $tabla2, $valor);
		
		return $respuesta;

	}	

	/*=============================================
	Mostrar notificaciones
	=============================================*/

	static public function ctrMostrarNotificaciones(){

		$tabla = "notificaciones";

		$respuesta = ModeloInicio::mdlMostrarNotificaciones($tabla);
		
		return $respuesta;

	}	

	/*=============================================
	Actualizar notificaciones
	=============================================*/

	static public function ctrActualizarNotificaciones($tipo, $cantidad){

		$tabla = "notificaciones";

		$respuesta = ModeloInicio::mdlActualizarNotificaciones($tabla, $tipo, $cantidad);
		
		return $respuesta;

	}	


}