<?php

class ComparacionModelo
{
    public static function ObtenerAlimentoUno($datos, $tablaBD)
    {
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD WHERE nombre = '$datos'");
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

    public static function ObtenerAlimentoDos($datos, $tablaBD)
    {
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD WHERE nombre = '$datos'");
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
}