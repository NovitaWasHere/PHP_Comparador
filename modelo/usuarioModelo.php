<?php
require_once "conexionBD.php";

class UsuarioModelo extends ConexionBD
{
    static public function registrarUsuarioModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos, y preparamos la sentencia de insert.
        $pdo = ConexionBD::conectarse()->prepare("INSERT INTO $tablaBD (email, nombre, contra) VALUES (:email, :nombre, :contra1)");

        //A cada parámetro de la sentencia le asignamos el valor que viene del formulario
        $pdo->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":contra1", $datos["contra1"], PDO::PARAM_STR);

        //Si la sentencia se ejecuta correctamente mandamos un mensaje de Bien y sino, lo contrario
        //Además, tratamos la excepción por si acaso
        try {
            if ($pdo->execute()) {
                return "Registro realizado correctamente";
            } else {
                return "Hubo un error en el proceso del registro";
            }
        } catch (PDOException $e) {
            echo "ERROR: $e";
        } finally {
            //Cerramos conexión
            $pdo = null;
        }
    }

    static public function listarUsuariosModelo($tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos al sentencia de seleccionar los datos
        $pdo = ConexionBD::conectarse()->prepare("SELECT idUsuario, email, nombre, contra, esAdmin FROM $tablaBD");
        //Si la sentencia sale bien, devolvemos todos los datos que se han encontrado
        try {
            $pdo->execute();
            return $pdo->fetchAll();
        } catch (PDOException $e) {
            echo "ERROR: $e";
        } finally {
            //Cerramos conexión
            $pdo = null;
        }
    }

    static public function editarUsuarioModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos la sentencia para solo elegir a un usario con X id
        $pdo = ConexionBD::conectarse()->prepare("SELECT idUsuario, email, nombre, contra, esAdmin FROM $tablaBD WHERE idUsuario = :idUsuario");
        //Ponemos a la sentencia el parametro que se encuentra en la URL
        $pdo->bindParam(":idUsuario", $datos, PDO::PARAM_INT);

        //Ejecutamos la sentencia y devolvemos el resultado de la misma
        try {
            $pdo->execute();
            return $pdo->fetch();
        } catch (PDOException $e) {
            echo "ERROR: $e";
        } finally {
            //Cerramos conexión
            $pdo = null;
        }
    }

    static public function actualizarUsuarioModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y prepramos la sentencia para actualizar un registro según X id
        $pdo = ConexionBD::conectarse()->prepare("UPDATE $tablaBD SET email = :email, nombre = :nombre, 
                 contra = :contra, esAdmin = :esAdmin WHERE idUsuario = :idUsuario");

        //Asignamos a la sentencia cada parámetro que obtenemos del formulario
        $pdo->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":contra", $datos["contra1"], PDO::PARAM_STR);
        $pdo->bindParam(":esAdmin", $datos["esAdmin"], PDO::PARAM_INT);
        $pdo->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        //Realizamos la sentencia, tratando la excepción y devolvemos una cadena dependiendo de
        //si la sentencia se ejecutó correctamente o no
        try {
            if ($pdo->execute()) {
                return "Actualización realizada correctamente";
            } else {
                return "Hubo un error en el proceso del actualización";
            }
        } catch (PDOException $e) {
            echo "ERROR: $e";
        } finally {
            //Cerramos conexión
            $pdo = null;
        }
    }

    static public function eliminarUsuarioModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos la sentencia la eliminar un registro
        $pdo = ConexionBD::conectarse()->prepare("DELETE FROM $tablaBD WHERE idUsuario = :idUsuario");
        //Asignamos el parámetro de la id a la sentencia
        $pdo->bindParam(":idUsuario", $datos, PDO::PARAM_INT);

        //Realizamos la sentencia, tratando la excepción y devolvemos una cadena dependiendo de
        //si la sentencia se ejecutó correctamente o no
        try {
            if ($pdo->execute()) {
                return "Eliminación realizada correctamente";
            } else {
                return "Hubo un error en el proceso del eliminación";
            }
        } catch (PDOException $e) {
            echo "ERROR: $e";
        } finally {
            //Cerramos conexión
            $pdo = null;
        }
    }
}

?>