<?php

require_once "conexion.php";

Class ModeloReserva{

    /*=============================================
    MOSTRAR RESERVA CON INNER JOIN
    =============================================*/

    static public function mdlMostrarReserva($tabla1, $tabla2, $tabla3, $valor){


        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_s = $tabla2.id_sala INNER JOIN $tabla3 ON $tabla1.tipo_s = $tabla3.id WHERE id_s = :id_s");

        $stmt-> bindParam(":id_s", $valor, PDO::PARAM_STR);

        $stmt-> execute();

        return $stmt -> fetchAll();

         

    }

    /*=============================================
    Mostrar código reservas
    =============================================*/

    static public function mdlMostrarCodigoReserva($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_reserva = :codigo_reserva");

		$stmt -> bindParam(":codigo_reserva", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		
	
	}

    /*=============================================
    GUARDAR RESERVA
    =============================================*/

    static public function mdlGuardarReserva($tabla, $datos){


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_salas, id_usuario, pago_reserva, 
        numero_transaccion, codigo_reserva, descripcion_reserva, fecha_ingreso, fecha_salida) VALUES (:id_salas, :id_usuario, :pago_reserva,
        :numero_transaccion, :codigo_reserva, :descripcion_reserva, :fecha_ingreso, :fecha_salida)");

        $stmt-> bindParam(":id_salas", $datos["id_salas"], PDO::PARAM_STR);
        $stmt-> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
        $stmt-> bindParam(":pago_reserva", $datos["pago_reserva"], PDO::PARAM_STR);
        $stmt-> bindParam(":numero_transaccion", $datos["numero_transaccion"], PDO::PARAM_STR);
        $stmt-> bindParam(":codigo_reserva", $datos["codigo_reserva"], PDO::PARAM_STR);
        $stmt-> bindParam(":descripcion_reserva", $datos["descripcion_reserva"], PDO::PARAM_STR);
        $stmt-> bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt-> bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);

        if ($stmt-> execute()) {
            
            return "ok";
        
        }else {
            
            return "error";
        }

        

         

    }



}