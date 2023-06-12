<?php
session_start();
if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Cliente"])) {
    header("location:registrarse.php");
}
require_once "../modelo/tipoAlimentoModelo.php";
require_once "../controlador/tipoAlimentoControlador.php";
require_once "../modelo/alimentosModelo.php";
require_once "../controlador/alimentosControlador.php";
require_once "../modelo/comparacionModelo.php";
require_once "../controlador/comparacionControlador.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>¡A comparar!</title>
    <link rel="stylesheet" href="estilosInicio.css">
    <script src="scriptsElegirAlimento.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="body1">
<?php

include("header.php");

?>
<main>
    <form class="formTipo" action="#" method="post" id="formTipos">
        <select name="elegirTipo1" id="elegirTipo1">
            <option value="0" selected>Elige tipo</option>
        </select>
        <select name="elegirTipo2" id="elegirTipo2">
            <option value="0" selected>Elige tipo</option>
        </select>
        <button id="botonTipo" type="submit">Elegir</button>
    </form>
    <form method="post" action="#" class="formAlimento1" id="formAlimentos">
        <div class="gridElementos">
            <div class="comida1">
                <select name="elegirAlimento1" id="elegirAlimento1">
                    <option>Elige alimento</option>
                </select>
                <div class="alimento1">
                    <img src="" id="imagenComida1" alt="">
                    <div class="tituloComida"><h1 id="tituloComida1"></h1></div>
                    <div class="statsComida1">
                        <div>Hidratos tot.</div>
                        <div>Azúcares</div>
                        <div>Grasas tot.</div>
                        <div>Grasas sat.</div>
                        <div>Proteínas</div>
                        <div>Valor energ.</div>

                        <div id="hidratosTot1">...</div>
                        <div id="azucares1">...</div>
                        <div id="grasasTot1">...</div>
                        <div id="grasasSat1">...</div>
                        <div id="proteinas1">...</div>
                        <div id="vEnergetico1">...</div>
                    </div>
                </div>
            </div>
            <div class="comida1">
                <select name="elegirAlimento2" id="elegirAlimento2">
                    <option>Elige alimento</option>
                </select>
                <div class="alimento2">
                    <img src="" alt="" id="imagenComida2">
                    <div class="tituloComida"><h1 id="tituloComida2"></h1></div>
                    <div class="statsComida1">
                        <div>Hidratos tot.</div>
                        <div>Azúcares</div>
                        <div>Grasas tot.</div>
                        <div>Grasas sat.</div>
                        <div>Proteínas</div>
                        <div>Valor energ.</div>
                        <div id="hidratosTot2">...</div>
                        <div id="azucares2">...</div>
                        <div id="grasasTot2">...</div>
                        <div id="grasasSat2">...</div>
                        <div id="proteinas2">...</div>
                        <div id="vEnergetico2">...</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divBotonComparar">
            <button type="submit" id="botonComparar">¡COMPARAR!</button>
        </div>
    </form>
    <div class="Estadisticas">
        <div class="Canvas1">
            <div class="titGraf"><h1>Hidratos Totales</h1></div>
            <div class="titGraf"><h1>Azúcares Totales</h1></div>
            <div class="titGraf"><h1>Grasas Totales</h1></div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <div>
                <canvas id="myChart1"></canvas>
            </div>
            <div>
                <canvas id="myChart2"></canvas>
            </div>
            <div class="titGraf"><h1>Grasas Saturadas</h1></div>
            <div class="titGraf"><h1>Proteínas Totales</h1></div>
            <div class="titGraf"><h1>Valor Energetico</h1></div>
            <div>
                <canvas id="myChart3"></canvas>
            </div>
            <div>
                <canvas id="myChart4"></canvas>
            </div>
            <div>
                <canvas id="myChart5"></canvas>
            </div>
        </div>
        <div class="TitCan">
            <h1>Composición Total</h1>
        </div>
        <div class="Canvas2">
            <div>
                <h1>Primera comida:</h1>
                <canvas id="myChart6"></canvas>
            </div>
            <div>
                <h1>Segunda comida:</h1>
                <canvas id="myChart7"></canvas>
            </div>
        </div>
    </div>
    <br>
</main>
<?php

include("footer.php")

?>
</body>
</html>