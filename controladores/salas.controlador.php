<?php

Class ControladorSalas{

static public function ctrMostrarSalas($valor){


    $tabla1 = "categorias";
    $tabla2 = "salas";

    $respuesta = ModeloSalas::mdlMostrarSalas($tabla1, $tabla2, $valor);

    return $respuesta;
}


}