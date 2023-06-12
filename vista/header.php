<header>
    <div><h1>NUTRICOMPARE</h1></div>
    <nav class="barra_botonesS">
        <?php
        if (isset($_SESSION["Cliente"]) || isset($_SESSION["Administrador"]) && $_SERVER['REQUEST_URI'] == "/phpComparador/phpComparador/index.php") {

            echo "<div class='boton_iniciar_sesion'><a href='vista/logoutUsuario.php'><h5>Cerrar Sesión</h5></a></div>";
            // echo $_SERVER['REQUEST_URI'];
        } else if (isset($_SESSION["Cliente"]) || isset($_SESSION["Administrador"]) && $_SERVER['REQUEST_URI'] == "/phpComparador/phpComparador/vista/elegirAlimento.php") {

            echo "<div class='boton_iniciar_sesion'><a href='logoutUsuario.php'><h5>Cerrar Sesión</h5></a></div>";
            // echo $_SERVER['REQUEST_URI'];
        } else {

            echo "<div class='boton_iniciar_sesion'><a href='vista/loginUsuario.php'><h5>Iniciar Sesión</h5></a></div>";

        }

        ?>

        <div class="demas"><a href="vista/elegirAlimento.php"><h5>Comparar</h5></a></div>
    </nav>
</header>