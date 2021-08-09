<?php

/*--=====================================
       CERRAR SESIÓN DE USUARIO 
======================================*/

session_destroy(); 

echo '<script>

window.location= "'.$ruta.'";

</script>';
