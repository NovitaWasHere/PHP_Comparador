<?php
//Pedimos cada archivo php que usamos en el Crud una vez
require_once "controlador/accionesControlador.php";
require_once "controlador/adminControlador.php";
require_once "controlador/usuarioControlador.php";
require_once "controlador/alimentosControlador.php";

require_once "modelo/accionesModelo.php";
require_once "modelo/adminModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/alimentosModelo.php";


//Creamos un objeto de la clase AccionesControlador
$acciones = new AccionesControlador();
/*E invocamos a esta función que hace que en cuanto nos metamos en el index
Se nos redirija a la vista principal*/
$acciones->vistaPrincipal();

//$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

?>
