<?php

class AlimentosControlador
{

    public function registrarAlimentoControlador()
    {

        if (isset($_POST["nombre"])) {
            $archivo_temporal = $_FILES['urlFoto']['tmp_name'];
            $archivo_nombre = $_FILES['urlFoto']['name'];
            $carpeta_destino = '../img/';
            $archivo_destino = $carpeta_destino . $archivo_nombre;
            echo $archivo_destino;
            move_uploaded_file($archivo_temporal, $archivo_destino);
            $datosControlador = array("nombre" => $_POST["nombre"], "hidratos" => $_POST["hidratos"], "azucares" => $_POST["azucares"],
                "grasasT" => $_POST["grasasT"], "grasasS" => $_POST["grasasS"], "proteinas" => $_POST["proteinas"],
                "energetico" => $_POST["energetico"], "urlFoto" => $archivo_destino, "tipo" => $_POST["tipoAlimento"]);


            $tablaBD = "alimentos";

            $respuesta = alimentosModelo::registrarAlimentoModelo($datosControlador, $tablaBD);

            //Como va a devolver una cadena, analizamos cual es y en consecuencia
            if ($respuesta == "Registro realizado correctamente") {
                //Si el registro se hizo bien, volvemos a la página de registrar
                header("location:crudUsuarios.php?accion=listarAlimento");
            } else {
                //Sino, mostramos un error
                echo "Hubo un error en el proceso del registro";
            }
        }


    }

    public function listarAlimentoControlador()
    {
        //Eligimos tabla
        $tablaBD = "alimentos";
        //llamamos a la función de listar todos
        $respuesta = AlimentosModelo::listarAlimentosModelo($tablaBD);

        //Con la que devuelva esta función, haremos con un foreach toda
        //la maquetación de la página por cada registro que devuelva la función
        echo json_encode($respuesta);
    }

    public function listarAlimentoPorTipoControlador1()
    {
        //Eligimos tabla
        $idTipo1 = $_POST["elegirTipo1"];
        $tablaBD = "alimentos";
        //llamamos a la función de listar todos
        $respuesta = AlimentosModelo::listarAlimentoPorTipoModelo1($tablaBD, $idTipo1);

        //Con la que devuelva esta función, haremos con un foreach toda
        //la maquetación de la página por cada registro que devuelva la función
        return json_encode($respuesta);
    }

    public function listarAlimentoPorTipoControlador2()
    {
        //Eligimos tabla
        $idTipo2 = $_POST["elegirTipo2"];
        $tablaBD = "alimentos";
        //llamamos a la función de listar todos
        $respuesta = AlimentosModelo::listarAlimentoPorTipoModelo2($tablaBD, $idTipo2);

        //Con la que devuelva esta función, haremos con un foreach toda
        //la maquetación de la página por cada registro que devuelva la función
        return json_encode($respuesta);
    }

    public function editarAlimentoControlador()
    {
        //Tomamos el valor del de parámetro idAlimento de la URL y se lo asignamos a una variable
        $datos = $_GET["idAlimento"];
        //Eligimos la tabla
        $tablaBD = "alimentos";
        //Llamamos a una función que nos devolverá un resultSet que usaremos para rellenar
        //el formulario de actualización de registro
        $respuesta = AlimentosModelo::editarAlimentosModelo($datos, $tablaBD);

        //Rellenamos el formulario con los valores del registro que se quiere actualizar <- Ahora usamos JS
        echo '<input type="hidden" value="' . $respuesta["idAlimento"] . '" name="idAlimento">
              <label for="inputNombre">Nombre de alimento:</label>
              <input type="text" name="nombre" value="' . $respuesta["nombre"] . '" placeholder="Nombre..." required>
              <label for="inputHidratos">Hidratos de Alimento:</label>
              <input type="text" name="hidratos" value="' . $respuesta["hidratosTotales"] . '" placeholder="Hidratos..." required>
              <label for="inputAzucares">Azucares:</label>
              <input type="text" name="azucares" value="' . $respuesta["azucares"] . '" placeholder="Azucares..." required>
              <label for="inputGrasasT">Grasas Totales:</label>
              <input type="text" name="grasasT" value="' . $respuesta["grasasTotales"] . '" placeholder="Grasas Totales..." required>
              <label for="inputGrasasS">Grasas Saturadas:</label>
              <input type="text" name="grasasS" value="' . $respuesta["grasasSaturadas"] . '" placeholder="Grasas Saturadas..." required>
              <label for="inputProteinas">Proteinas:</label>
              <input type="text" name="proteinas" value="' . $respuesta["proteinas"] . '" placeholder="Proteinas..." required>
              <label for="inputVEnergetico">Valor Energetico:</label>
              <input type="text" name="energetico" value="' . $respuesta["valorEnergetico"] . '" placeholder="Valor Energetico..." required>';

        if ($respuesta["idTipo"] == 1) {
            echo '<select name="tipo">
                   <option value="1" selected>Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 2) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2" selected>Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 3) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3" selected>Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 4) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4" selected>Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 5) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5" selected>Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 6) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6" selected>Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 7) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7" selected>Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 8) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8" selected>Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 9) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9" selected>Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 10) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10" selected>Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 11) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11" selected>Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 12) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12" selected>Miscelánea</option>
                   <option value="13">Productos de uso nutricional específico</option> 
                </select>';
        } else if ($respuesta["idTipo"] == 13) {
            echo '<select name="tipo">
                   <option value="1">Lácteos y derivados</option>
                   <option value="2">Huevos y derivados</option>
                   <option value="3">Cárnicos y derivados</option>
                   <option value="4">Pescados, moluscos, reptiles, crustáceos y derivados</option>
                   <option value="5">Grasas y aceites</option>
                   <option value="6">Cereales y derivados</option>
                   <option value="7">Legumbres, semillas, frutos secos y derivados</option>
                   <option value="8">Verduras, hortalizas y derivados</option>
                   <option value="9">Frutas y derivados</option>
                   <option value="10">Azúcar, chocolate y derivados</option>
                   <option value="11">Bebidas (no lácteas)</option>
                   <option value="12">Miscelánea</option>
                   <option value="13" selected>Productos de uso nutricional específico</option> 
                </select>';
        }

        echo '<button type="submit" id="botonRegistrar">Actualizar</button>';

    }

    public function actualizarAlimentoControlador()
    {
        //Si el parámetro nombre viene con información
        if (isset($_POST["nombre"])) {
            //Hacemos una array con los datos del formulario
            $datosControlador = array("idAlimento" => $_POST["idAlimento"], "nombre" => $_POST["nombre"], "hidratos" => $_POST["hidratos"], "azucares" => $_POST["azucares"],
                "grasasT" => $_POST["grasasT"], "grasasS" => $_POST["grasasS"], "proteinas" => $_POST["proteinas"],
                "energetico" => $_POST["energetico"], "tipo" => $_POST["tipo"]);
            //Elegimos una tabla
            $tablaBD = "alimentos";

            //Invocamos a esta función para ver que cadena devuelve
            $respuesta = AlimentosModelo::actualizarAlimentosModelo($datosControlador, $tablaBD);

            //Si la actualización fue correcta redirigimos a la página de listado
            if ($respuesta == "Actualización realizada correctamente") {
                header("location:crudUsuarios.php?accion=listarAlimento");
            } else {
                echo "Hubo un error en el proceso del actualización";
            }
        }
    }

    public function eliminarAlimentoControlador()
    {
        //Si el parámetro de la URL de la id del Usuario viene con información
        if (isset($_GET["idAlimento"])) {
            //Hacemos una variable con ese valor del parámetro
            $datosControlador = $_GET["idAlimento"];

            //Elegimos tabla
            $tablaBD = "alimentos";

            //Vemos que cadena retorna la función de eliminar
            $respuesta = AlimentosModelo::eliminarAlimentosModelo($datosControlador, $tablaBD);

            //Dependiendo de la cadena hacemos una cosa u otra
            if ($respuesta == "Eliminación realizada correctamente") {

                header("location:index.php?accion=listarAlimento");

            } else {
                echo "Hubo un error en el proceso del eliminación";
            }
        }
    }

}