<?php

require_once "conexion.php";

Class ModeloCafe{

    static public function mdlMostrarCafe($tabla){


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt-> execute();

        return $stmt -> fetchAll();

         

    }

}