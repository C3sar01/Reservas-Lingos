<?php

require_once "conexion.php";

Class ModeloCategorias{

    static public function mdlMostrarCategorias($tabla){


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt-> execute();

        return $stmt -> fetchAll();

         

    }

}