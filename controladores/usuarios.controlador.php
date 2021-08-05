<?php

Class ControladorBanner{

static public function ctrMostrarBanner(){


    $tabla = "banner";

    $respuesta = ModeloBanner::mdlMostrarBanner($tabla);

    return $respuesta;
}


}