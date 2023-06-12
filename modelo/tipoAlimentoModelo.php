<?php
require_once "conexionBD.php";

class TipoAlimentoModelo
{
    public static function listarTipoAlimentosModelo($tablaBD)
    {
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD");
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