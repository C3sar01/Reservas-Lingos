<?php

Class ControladorInferior{

static public function ctrMostrarInferior(){


    $tabla = "inferior";

    $respuesta = ModeloInferior::mdlMostrarInferior($tabla);

    return $respuesta;
}


}