<?php

class UsuarioControlador
{
    public function registrarUsuarioControlador()
    {
        //Si el parámetro del email del formulario de registro viene con información
        if (isset($_POST["email"])) {
            //Crearemos una array con el contenido del formulario
            $datosControlador = array("email" => $_POST["email"], "nombre" => $_POST["nombre"],
                "contra1" => $_POST["contra1"]);
            //Creamos una variable con el nombre de la tabla a la que le queremos insertar
            $tablaBD = "usuario";

            //Inicializamos una variable con el valor que devuelva la función
            $respuesta = UsuarioModelo::registrarUsuarioModelo($datosControlador, $tablaBD);

            //Como va a devolver una cadena, analizamos cual es y en consecuencia
            if ($respuesta == "Registro realizado correctamente") {
                //Si el registro se hizo bien, volvemos a la página de registrar
                header("location:crudUsuarios.php?accion=listarUsuario");
            } else {
                //Sino, mostramos un error
                echo "Hubo un error en el proceso del registro";
            }
        }
    }

    public function registrarseComoCliente()
    {
        //Si el parámetro del email del formulario de registro viene con información
        if (isset($_POST["email"])) {
            //Crearemos una array con el contenido del formulario
            $datosControlador = array("email" => $_POST["email"], "nombre" => $_POST["nombre"],
                "contra1" => $_POST["contra1"]);
            //Creamos una variable con el nombre de la tabla a la que le queremos insertar
            $tablaBD = "usuario";

            //Inicializamos una variable con el valor que devuelva la función
            $respuesta = UsuarioModelo::registrarUsuarioModelo($datosControlador, $tablaBD);

            //Como va a devolver una cadena, analizamos cual es y en consecuencia
            if ($respuesta == "Registro realizado correctamente") {
                //Si el registro se hizo bien, volvemos a la página de registrar
                header("location:loginUsuario.php");
            } else {
                //Sino, mostramos un error
                echo "Hubo un error en el proceso del registro";
            }
        }
    }

    public function listarUsuariosControlador()
    {
        //Eligimos tabla
        $tablaBD = "usuario";
        //llamamos a la función de listar todos
        $respuesta = UsuarioModelo::listarUsuariosModelo($tablaBD);

        //Con la que devuelva esta función, haremos con un foreach toda
        //la maquetación de la página por cada registro que devuelva la función
        echo json_encode($respuesta);
    }

    public function editarUsuarioControlador()
    {
        //Tomamos el valor del de parámetro idUsuario de la URL y se lo asignamos a una variable
        $datosControlador = $_GET["idUsuario"];
        //Eligimos la tabla
        $tablaBD = "usuario";
        //Llamamos a una función que nos devolverá un resultSet que usaremos para rellenar
        //el formulario de actualización de registro
        $respuesta = UsuarioModelo::editarUsuarioModelo($datosControlador, $tablaBD);

        //Rellenamos el formulario con los valores del registro que se quiere actualizar <- Ahora usamos JS
        echo '<input type="hidden" value="' . $respuesta["idUsuario"] . '" name="idUsuario">
              <label for="inputCorreo">Correo electrónico:</label>
              <input type="email" name="email" id="inputCorreo" value="' . $respuesta["email"] . '" placeholder="Correo electrónico..." required>
              <label for="inputNombre">Nombre del usuario:</label>
              <input type="text" name="nombre" id="inputNombre" value="' . $respuesta["nombre"] . '" placeholder="Nombre del usuario..." maxlength="20"
                       required>
              <label for="inputContra1">Contraseña del usuario:</label>
              <input type="password" name="contra1" id="inputContra1" value="' . $respuesta["contra"] . '" placeholder="Contraseña del usuario..."
                       maxlength="20" required>
              <label>¿Administrador?</label>';

        if ($respuesta["esAdmin"] == 0) {
            echo '<select name="esAdmin">
                     <option value="0" selected>No</option>
                     <option value="1">Sí</option>
                  </select>';
        } else {
            echo '<select name="esAdmin">
                     <option value="0">No</option>
                     <option value="1" selected>Sí</option>
                  </select>';
        }
        echo '<button type="submit" id="botonRegistrar">Actualizar</button>';
    }

    public function actualizarUsuarioControlador()
    {
        //Si el parámetro nombre viene con información
        if (isset($_POST["email"])) {
            //Hacemos una array con los datos del formulario
            $datosControlador = array("idUsuario" => $_POST["idUsuario"], "email" => $_POST["email"],
                "nombre" => $_POST["nombre"], "contra1" => $_POST["contra1"], "esAdmin" => $_POST["esAdmin"]);
            //Elegimos una tabla
            $tablaBD = "usuario";

            //Invocamos a esta función para ver que cadena devuelve
            $respuesta = UsuarioModelo::actualizarUsuarioModelo($datosControlador, $tablaBD);

            //Si la actualización fue correcta redirigimos a la página de listado
            if ($respuesta == "Actualización realizada correctamente") {
                header("location:crudUsuarios.php?accion=listarUsuario");
            } else {
                echo "Hubo un error en el proceso del actualización";
            }
        }
    }

    public function eliminarUsuarioControlador()
    {
        //Si el parámetro de la URL de la id del Usuario viene con información
        if (isset($_GET["idUsuario"])) {
            //Hacemos una variable con ese valor del parámetro
            $datosControlador = $_GET["idUsuario"];

            //Elegimos tabla
            $tablaBD = "usuario";

            //Vemos que cadena retorna la función de eliminar
            $respuesta = UsuarioModelo::eliminarUsuarioModelo($datosControlador, $tablaBD);

            //Dependiendo de la cadena hacemos una cosa u otra
            if ($respuesta == "Eliminación realizada correctamente") {
                header("location:crudUsuarios.php?accion=listarUsuario");
            } else {
                echo "Hubo un error en el proceso del eliminación";
            }
        }
    }
}

?>
