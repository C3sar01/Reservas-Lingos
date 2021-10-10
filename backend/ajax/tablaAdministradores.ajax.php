<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class tablaAdmin{
/*=============================================
Tabla Administradores
=============================================*/

    public function mostrarTabla(){

        $respuesta = ControladorAdministradores::ctrMostrarAdministradores(null, null);

        $datosJson = '{

            "data":[
                [
                    "1",
                    "Lingos Talca",
                    "Lingos",
                    "Administrador",
                    "1",
                    "botones"

                ]
            ]

        }';

        echo $datosJson;


    }
  
}

/*=============================================
Tabla Administradores
=============================================*/

$tabla = new TablaAdmin();
$tabla -> mostrarTabla();