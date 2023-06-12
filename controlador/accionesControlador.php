<?php

class AccionesControlador
{
    public function vistaPrincipal()
    {
        //La función hace un include de la página de la vista principal
        include "vista/paginaPrincipal.php";
    }

    public function acciones()
    {
        //Si el parámetro acción viene con información
        if (isset($_GET["accion"])) {
            //Hacemos una variable sea igual a la información del parámetro.
            $acciones = $_GET["accion"];
        } else {
            //Sino, decimos que la variable sea igual a index para que nos envie de nuevo a la página principal
            $acciones = "index";
        }
        //Esta variable sería igual a lo que retorne esta función, que será un ruta para hacer un include
        $respuesta = Modelo::accionesModelo($acciones);
        //Aquí hacemos un include de lo que devuelva la función de arriba
        include $respuesta;
    }
}

?>