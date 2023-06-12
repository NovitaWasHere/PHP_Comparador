<?php

class AdminControlador
{
    public function ingresoControladorUsuario()
    {
        //Si el input de nombre viene con información
        if (isset($_POST["nombre"])) {

            //Haremos una array con los datos que devuelve el formulario POST
            $datosControlador = array("nombre" => $_POST["nombre"],
                "contra" => $_POST["contra1"]);
            //Elegimos la tabla usuario para mandarsela a la función de abajo
            $tablaBD = "usuario";
            //E invocamos la función pasándole todos los parámetros anteriores
            $respuesta = AdminModelo::ingresoModelo($datosControlador, $tablaBD);

            //Esta función devolverá una array con el resultado de la sentencia select, que usaremos
            //para comprobar si el nombre insertado en el formulario y la contraseña son iguales al
            //resultado de la sentencia, es decir, si el usuario existe realmente y si es administrador
            if ($respuesta["nombre"] == $_POST["nombre"] && $respuesta["contra"] == $_POST["contra1"] && $respuesta["esAdmin"] == 1) {
                //Si el usuario y contraseña son correctos, comenzaremos una sesión
                session_start();
                //Y creamos un atributo en la sesión para comprobar si te has registrado, antes de entrar a cualquier otra página
                $_SESSION["Administrador"] = true;

                header("location:../index.php");
            } else if ($respuesta["nombre"] == $_POST["nombre"] && $respuesta["contra"] == $_POST["contra1"] && $respuesta["esAdmin"] == 0) {
                session_start();
                //Y creamos un atributo en la sesión para comprobar si te has registrado, antes de entrar a cualquier otra página
                $_SESSION["Cliente"] = true;
                //Por último, redirigimos a la página del listado de usuarios, dando a la acción el valor de listar
                header("location:../index.php");
            } else {
                //Si no existe el usuario, error
                header("location:loginUsuario.php");
            }
        }
    }
}

?>