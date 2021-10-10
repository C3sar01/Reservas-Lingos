<?php

class ControladorAdministradores
{

    /*=============================================
	Ingreso Administradores
	=============================================*/

    public function ctrIngresoAdministradores()
    {

        if (isset($_POST["ingresoUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])
            ) {

                $tabla = "administradores";
                $item = "usuario";
                $valor = $_POST["ingresoUsuario"];

                $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

                if (
                    $respuesta["usuario"] == $_POST["ingresoUsuario"]
                    && $respuesta["password"] == $_POST["ingresoPassword"]
                ) {

                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["idBackend"] = $respuesta["id"];

                    echo '<script>

							window.location = "' . $_SERVER["REQUEST_URI"] . '";

				 		</script>';
                } else {

                    echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
                }
            } else {

                echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
            }
        }
    }

    /*=============================================
	Mostrar Administradores
	=============================================*/

    static public function ctrMostrarAdministradores($item, $valor){

        $tabla = "administradores";

        $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

        return $respuesta;
    
    }
 

}
