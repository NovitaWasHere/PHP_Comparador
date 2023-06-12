<?php
require_once '../modelo/usuarioModelo.php';
require_once '../controlador/usuarioControlador.php';
require_once '../modelo/alimentosModelo.php';
require_once '../controlador/alimentosControlador.php';
require_once "../modelo/tipoAlimentoModelo.php";
require_once "../controlador/tipoAlimentoControlador.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>👤 Panel de administración 👤</title>
    <!--La ruta la tenemos que poner diferente porque estamos llamando a esta pagina desde index.php-->
    <link rel="stylesheet" href="estilosCrud.css">
    <script src="scriptsCrudUsuario.js"></script>
    <script src="scriptsElegirAlimento.js"></script>
</head>
<body class="cuerpoCrud">
<?php
require_once '../modelo/accionesModelo.php';
require_once '../controlador/accionesControlador.php';
$rutas = new AccionesControlador();
$rutas->acciones();
?>
</body>
</html>
