<?php

require_once "conexion.php";

Class ModeloInferior{

    static public function mdlMostrarInferior($tabla){


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt-> execute();

        return $stmt -> fetchAll();

         

    }

}