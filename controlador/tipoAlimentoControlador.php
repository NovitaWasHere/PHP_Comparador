<?php

class TipoAlimentoControlador
{
    public function listarTipoAlimentosControlador()
    {
        //Eligimos tabla
        $tablaBD = "tipoAlimento";
        //llamamos a la función de listar todos
        $respuesta = TipoAlimentoModelo::listarTipoAlimentosModelo($tablaBD);

        //Con la que devuelva esta función, haremos con un foreach toda
        //la maquetación de la página por cada registro que devuelva la función
        echo json_encode($respuesta);
    }
}