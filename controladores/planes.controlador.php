<?php

Class ControladorPlanes{

static public function ctrMostrarPlanes(){


    $tabla = "planes";

    $respuesta = ModeloPlanes::mdlMostrarPlanes($tabla);

    return $respuesta;
}


}