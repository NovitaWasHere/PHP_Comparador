<?php
require_once "../controlador/accionesControlador.php";
require_once "../controlador/adminControlador.php";
require_once "../controlador/usuarioControlador.php";
require_once "../controlador/alimentosControlador.php";
require_once "../controlador/tipoAlimentoControlador.php";
require_once "../controlador/comparacionControlador.php";

require_once "../modelo/accionesModelo.php";
require_once "../modelo/adminModelo.php";
require_once "../modelo/usuarioModelo.php";
require_once "../modelo/alimentosModelo.php";
require_once "../modelo/tipoAlimentoModelo.php";
require_once "../modelo/comparacionModelo.php";

$usuario = new UsuarioControlador();
$alimento = new AlimentosControlador();
$tipoAlimento = new TipoAlimentoControlador();
$comparacion = new comparacionControlador();

$aux = "";
switch ($_GET["modo"]) {
    case "todosUsuarios":
    {
        $usuario->listarUsuariosControlador();
        break;
    }
    case "unicoUsuario":
    {
        $usuario->editarUsuarioControlador();
        break;
    }
    case "todosAlimentos":
    {
        $alimento->listarAlimentoControlador();
        break;
    }
    case "alimento1PorTipo":
    {
        $aux = $alimento->listarAlimentoPorTipoControlador1();
        $nuevoJSON = substr_replace($aux, ",", strlen($aux) - 1); //reemplazar el último carácter

        $aux = $alimento->listarAlimentoPorTipoControlador2();
        $aux = substr($aux, 1);
        $nuevoJSON .= $aux;
        break;
    }
    case "unicoAlimento":
    {
        $alimento->editarAlimentoControlador();
        break;
    }
    case "todosTipos":
    {
        $tipoAlimento->listarTipoAlimentosControlador();
        break;
    }
    case "comparacion":
    {

        $aux1 = $comparacion->ObtenerAliUno();

        $nuevoJSONcomparacion = substr_replace($aux1, ",", strlen($aux1) - 1); //reemplazar el último carácter

        $aux = $comparacion->ObtenerAliDos();
        $aux = substr($aux, 1);
        $nuevoJSONcomparacion .= $aux;

        break;

    }

}

if (isset($_GET["modo2"])) {
    switch ($_GET["modo2"]) {
        case "alimento2PorTipo":
        {
            echo $nuevoJSON;
            break;
        }
        case "comparaciones":
        {

            echo $nuevoJSONcomparacion;
            break;
        }
    }
}
