<?php

Class ControladorCafe{

static public function ctrMostrarCafe(){


    $tabla = "cafe";

    $respuesta = ModeloCafe::mdlMostrarCafe($tabla);

    return $respuesta;
}


}