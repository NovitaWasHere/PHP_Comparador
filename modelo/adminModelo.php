<?php
require_once "conexionBD.php";

class AdminModelo extends ConexionBD
{
    static public function ingresoModelo($datosControlador, $tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos una sentencia de SQL que será un select para comprobar
        //si el usuario y contraseña insertados son correctos
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD WHERE nombre = :nombre");

        //Hacemos que el parámetro :nombre de la sentencia sea igual al nombre del formulario
        $pdo->bindParam(":nombre", $datosControlador["nombre"], PDO::PARAM_STR);
        try {
            //Ejecutamos la sentencia
            $pdo->execute();
            //Devolvemos el resultado de la sentencia
            return $pdo->fetch();
        } catch (PDOException $e) {
            //Tratamos la excepción
            echo "ERROR: $e";
        } finally {
            //Cerramos al conexión
            $pdo = null;
        }

    }
}

?>
