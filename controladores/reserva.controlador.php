<?php

Class ControladorReserva{

    /*=============================================
    Mostrar Reserva
    =============================================*/

    static public function ctrMostrarReserva($valor){

        $tabla1 = "salas";
        $tabla2 = "reserva";
        $tabla3 = "categorias";

        $respuesta = ModeloReserva::mdlMostrarReserva($tabla1, $tabla2, $tabla3, $valor);

        return $respuesta;

    }

    /*=============================================
    Mostrar Código Reserva
    =============================================*/

    static public function ctrMostrarCodigoReserva($valor){

        $tabla = "reserva";
     
        $respuesta = ModeloReserva::mdlMostrarCodigoReserva($tabla, $valor);

        return $respuesta;

    }

    /*=============================================
    GUARDAR RESERVA
    =============================================*/

    static public function ctrGuardarReserva($valor){

        $tabla = "reserva";
     
        $respuesta = ModeloReserva::mdlGuardarReserva($tabla, $valor);

        return $respuesta;

    }

    /*=============================================
	Mostrar Reservas por usuario
	=============================================*/

	static public function ctrMostrarReservasUsuario($valor){

		$tabla = "reserva";

		$respuesta = ModeloReserva::mdlMostrarReservasUsuario($tabla, $valor);

		return $respuesta;
		
	}

    


}