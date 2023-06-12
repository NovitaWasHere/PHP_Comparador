<?php

class Modelo
{
    static public function accionesModelo($accion)
    {
        if ($accion == "registrarUsuario" || $accion == "listarUsuario" || $accion == "editarUsuario" || $accion == "registrarAlimento" || $accion == "listarAlimento" || $accion == "editarAlimentos" || $accion == "paginaPrincipal" || $accion == "elegirAlimento") {
            $pagina = "" . $accion . ".php";
        } else if ($accion == "registrarse") {
            header("location:vista/$accion.php");
        } else if ($accion == "index") {
            $pagina = "vista/inicio.php";
        } else {
            $pagina = "vista/inicio.php";
        }

        return $pagina;
    }
}

?>
