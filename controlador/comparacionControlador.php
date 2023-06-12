<?php

class ComparacionControlador
{
    /*   public function ObtenerAlimentos()
     {
         //-------------------------------------------------------------------
         //Tomar Alimento numero 1
         $datos = $_POST["elegirAlimento1"];
         //Eligimos tabla
         $tablaBD = "alimentos";
         //llamamos a la función de listar todos
         $respuesta1 = ComparacionModelo::ObtenerAlimentoUno($datos, $tablaBD);
         //-------------------------------------------------------------------

         //-------------------------------------------------------------------
         //Tomar Alimento numero 2
         $datos = $_POST["elegirAlimento2"];
         //Eligimos tabla
         $tablaBD = "alimentos";
         //llamamos a la función de listar todos
         $respuesta2 = ComparacionModelo::ObtenerAlimentoDos($datos, $tablaBD);
         //-------------------------------------------------------------------

         //Hidratos Totales
         $numero1H = ($respuesta1[0]['hidratosTotales']);
         $numero2H = ($respuesta2[0]['hidratosTotales']);

         $totalH = floatval($numero1H) + floatval($numero2H);

         $resuH = $numero1H * 100 / $totalH;
         $resu2H = $numero2H * 100 / $totalH;

         //Azucares
         $numero1A = ($respuesta1[0]['azucares']);
         $numero2A = ($respuesta2[0]['azucares']);

         $totalA = floatval($numero1A) + floatval($numero2A);

         $resuA = $numero1A * 100 / $totalA;
         $resu2A = $numero2A * 100 / $totalA;

         //Grasas Totales
         $numero1G = ($respuesta1[0]['grasasTotales']);
         $numero2G = ($respuesta2[0]['grasasTotales']);

         $totalG = floatval($numero1G) + floatval($numero2G);

         $resuG = $numero1G * 100 / $totalG;
         $resu2G = $numero2G * 100 / $totalG;

         //Grasas Saturadas
         $numero1GS = ($respuesta1[0]['grasasSaturadas']);
         $numero2GS = ($respuesta2[0]['grasasSaturadas']);

         $totalGS = floatval($numero1GS) + floatval($numero2GS);

         $resuGS = $numero1GS * 100 / $totalGS;
         $resu2GS = $numero2GS * 100 / $totalGS;

         //Proteinas
         $numero1P = ($respuesta1[0]['proteinas']);
         $numero2P = ($respuesta2[0]['proteinas']);

         $totalP = floatval($numero1P) + floatval($numero2P);

         $resuP = $numero1P * 100 / $totalP;
         $resu2P = $numero2P * 100 / $totalP;

         //Valor Energetico
         $numero1V = ($respuesta1[0]['valorEnergetico']);
         $numero2V = ($respuesta2[0]['valorEnergetico']);

         $totalV = floatval($numero1V) + floatval($numero2V);

         $resuV = $numero1V * 100 / $totalV;
         $resu2V = $numero2V * 100 / $totalV;


         // $resultadosV = implode(array("Hola",$resu2V,"------",$resuV));

         $resuH = round($resuH, 2);
         $resu2H = round($resu2H, 2);
         $resuA = round($resuA, 2);
         $resu2A = round($resu2A, 2);
         $resuG = round($resuG, 2);
         $resu2G = round($resu2G, 2);
         $resuGS = round($resuGS, 2);
         $resu2GS = round($resu2GS, 2);
         $resuP = round($resuP, 2);
         $resu2P = round($resu2P, 2);
         $resuV = round($resuV, 2);
         $resu2V = round($resu2V, 2);

         $primerAlimento = array($resuH, $resuA, $resuG, $resuGS, $resuP, $resuV);

         $segundoAlimento = array($resu2H, $resu2A, $resu2G, $resu2GS, $resu2P, $resu2V);

        //-------------------------------------------------------------------

    }
      */
    public function ObtenerAliUno()
    {

        $datos = $_POST["elegirAlimento1"];
        //Eligimos tabla
        $tablaBD = "alimentos";
        //llamamos a la función de listar todos
        $respuesta1 = ComparacionModelo::ObtenerAlimentoUno($datos, $tablaBD);

        return json_encode($respuesta1);

    }

    public function ObtenerAliDos()
    {

        $datos = $_POST["elegirAlimento2"];
        //Eligimos tabla
        $tablaBD = "alimentos";
        //llamamos a la función de listar todos
        $respuesta2 = ComparacionModelo::ObtenerAlimentoUno($datos, $tablaBD);

        return json_encode($respuesta2);

    }
}