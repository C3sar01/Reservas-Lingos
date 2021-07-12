<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

require_once "controladores/planes.controlador.php";
require_once "modelos/planes.modelo.php";

require_once "controladores/categorias.controlador.php";
require_once "modelos/categorias.modelo.php";

require_once "controladores/inferior.controlador.php";
require_once "modelos/inferior.modelo.php";

require_once "controladores/cafe.controlador.php";
require_once "modelos/cafe.modelo.php";

require_once "controladores/salas.controlador.php";
require_once "modelos/salas.modelo.php";

require_once "controladores/reserva.controlador.php";
require_once "modelos/reserva.modelo.php";






$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
