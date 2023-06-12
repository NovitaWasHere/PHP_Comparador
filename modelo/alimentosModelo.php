<?php

class AlimentosModelo
{
    static public function registrarAlimentoModelo($datos, $tablaBD)
    {

        //Nos conectamos a la base de datos, y preparamos la sentencia de insert.
        $pdo = ConexionBD::conectarse()->prepare("INSERT INTO $tablaBD (nombre, hidratosTotales,
                   azucares,grasasTotales,grasasSaturadas,proteinas,valorEnergetico, urlFoto,idTipo)
            VALUES (:nombre,:hidratosTotales,:azucares,:grasasTotales,:grasasSaturadas,:proteinas,
                    :valorEnergetico, :urlFoto, :idTipo)");

        //A cada parámetro de la sentencia le asignamos el valor que viene del formulario
        $pdo->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":hidratosTotales", $datos["hidratos"], PDO::PARAM_STR);
        $pdo->bindParam(":azucares", $datos["azucares"], PDO::PARAM_STR);
        $pdo->bindParam(":grasasTotales", $datos["grasasT"], PDO::PARAM_STR);
        $pdo->bindParam(":grasasSaturadas", $datos["grasasS"], PDO::PARAM_STR);
        $pdo->bindParam(":proteinas", $datos["proteinas"], PDO::PARAM_STR);
        $pdo->bindParam(":valorEnergetico", $datos["energetico"], PDO::PARAM_STR);
        $pdo->bindParam(":urlFoto", $datos["urlFoto"], PDO::PARAM_STR);
        $pdo->bindParam(":idTipo", $datos["tipo"], PDO::PARAM_INT);


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

    static public function listarAlimentosModelo($tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos al sentencia de seleccionar los datos
        $pdo = ConexionBD::conectarse()->prepare("SELECT idAlimento, nombre, hidratosTotales, azucares, grasasTotales, grasasSaturadas
        , proteinas, valorEnergetico, idTipo FROM $tablaBD");
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

    static public function listarAlimentoPorTipoModelo1($tablaBD, $idTipo1)
    {
        //Nos conectamos a la base de datos y preparamos al sentencia de seleccionar los datos
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD where idTipo = $idTipo1");
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

    static public function listarAlimentoPorTipoModelo2($tablaBD, $idTipo2)
    {
        //Nos conectamos a la base de datos y preparamos al sentencia de seleccionar los datos
        $pdo = ConexionBD::conectarse()->prepare("SELECT * FROM $tablaBD where idTipo = $idTipo2");
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

    static public function editarAlimentosModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos la sentencia para solo elegir a un usario con X id
        $pdo = ConexionBD::conectarse()->prepare("SELECT idAlimento, nombre, hidratosTotales, azucares,grasasTotales,
       grasasSaturadas,proteinas,valorEnergetico,idTipo FROM $tablaBD WHERE idAlimento = :idAlimento");
        //Ponemos a la sentencia el parametro que se encuentra en la URL
        $pdo->bindParam(":idAlimento", $datos, PDO::PARAM_INT);

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

    static public function actualizarAlimentosModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y prepramos la sentencia para actualizar un registro según X id
        $pdo = ConexionBD::conectarse()->prepare("UPDATE $tablaBD SET nombre=:nombre, hidratosTotales=:hidratosTotales, 
        azucares=:azucares, grasasTotales=:grasasTotales, grasasSaturadas=:grasasSaturadas, proteinas=:proteinas, 
        valorEnergetico=:valorEnergetico, idTipo=:idTipo WHERE idAlimento=:idAlimento");

        //Asignamos a la sentencia cada parámetro que obtenemos del formulario
        $pdo->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":hidratosTotales", $datos["hidratos"], PDO::PARAM_STR);
        $pdo->bindParam(":azucares", $datos["azucares"], PDO::PARAM_STR);
        $pdo->bindParam(":grasasTotales", $datos["grasasT"], PDO::PARAM_STR);
        $pdo->bindParam(":grasasSaturadas", $datos["grasasS"], PDO::PARAM_STR);
        $pdo->bindParam(":proteinas", $datos["proteinas"], PDO::PARAM_STR);
        $pdo->bindParam(":valorEnergetico", $datos["energetico"], PDO::PARAM_STR);
        $pdo->bindParam(":idTipo", $datos["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":idAlimento", $datos["idAlimento"], PDO::PARAM_INT);

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

    static public function eliminarAlimentosModelo($datos, $tablaBD)
    {
        //Nos conectamos a la base de datos y preparamos la sentencia la eliminar un registro
        $pdo = ConexionBD::conectarse()->prepare("DELETE FROM $tablaBD WHERE idAlimento = :idAlimento");
        //Asignamos el parámetro de la id a la sentencia
        $pdo->bindParam(":idAlimento", $datos, PDO::PARAM_INT);

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