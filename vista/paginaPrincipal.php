<?php
session_start();
if (!isset($_SESSION["Invitado"])) {
    $_SESSION["Invitado"] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="vista/estilosInicio.css">
    <script src="vista/scriptInicio.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body class="body1">
<?php
if ($_SESSION["Invitado"] && !isset($_SESSION["Administrador"])) {
    include("vista/header.php");
} else {
    include("vista/headerAdmin.php");
}
?>

<section class="section1">
    <div class="portada_inicio_imagen">
        <img src="https://fotografias.larazon.es/clipping/cmsimages02/2022/04/01/BE78C788-5591-428B-A83A-FF2CDAF27C65/98.jpg?crop=4200,2363,x0,y218&width=1900&height=1069&optimize=low&format=webply"
             alt="imagen_comida">
    </div>
    <div class="Bienvenida"><h2>Compara tus comidas favoritas ! </h2>
        <h3>Descubre las críticas y las opiniones sobre las comidas</h3></div>
    <a href="vista/elegirAlimento.php">
        <button class="boton_comparar"><h2>Comparar Ahora</h2></button>
    </a>
</section>
<section class="section2" id="section2">
    <div class="Estadistica">
        <canvas id="myChart"></canvas>
    </div>
    <div class="info">
        <div class="texto_info">
            <h3>¡Comparaciones representadas en gráficas!</h3>
            <p>Con nuestra sofisticada forma de analizar datos te mostraremos la comparación de los componentes
                nutricionales que
                manejan las comidas que selecciones
            </p>
        </div>
    </div>
</section>
<?php

include("vista/footer.php")

?>
</body>
</html>