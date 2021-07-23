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

        $stmt-> bindParam(":codigo_reserva", $valor, PDO::PARAM_STR);

        $stmt-> execute();

        return $stmt -> fetchAll();

         

    }

}