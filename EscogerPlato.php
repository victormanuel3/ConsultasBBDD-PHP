<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EscogerPlato</title>
    <link rel="stylesheet" href="Escoger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tablas.css">
</head>

<body>
    <form class="form-escoger-plato" action="EscogerPlato.php" method="post">
        <div class="titulo-escoger-plato">
            <h1>ESCOGER PLATO PARA MOSTRAR SUS DATOS Y DE SU COCINERO</h1>
        </div>
        <div class="container">
            <div class="contiene-select">
                <select name="plato" required>
                    <?php
                    require "bbdd.php";
                    $conexion = conectar("localhost", "root", "", "restaurant");
                    $select = "SELECT nombre FROM plato";
                    $resultado = mysqli_query($conexion, $select);
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value=\"" . $fila["nombre"] . "\">" . $fila["nombre"] . "</option>";
                    }
                    ?>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    <?php
    if (isset($_POST["plato"])) {
        $plato = $_POST["plato"];
        $consulta = "SELECT * FROM plato WHERE nombre = '$plato'";
        $resultadoConsulta = mysqli_query($conexion, $consulta);
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Tipo</th>";
        echo "<th>Precio</th>";
        echo "<th>Cocinero</th>";
        echo "</tr>";
        $array = mysqli_fetch_assoc($resultadoConsulta);
        echo "<tr>";
        echo "<td>" . $array["nombre"] . "</td>";
        echo "<td>" . $array["tipo"] . "</td>";
        echo "<td>" . $array["precio"] . "</td>";
        echo "<td>" . $array["cocinero"] . "</td>";
        echo "</tr>";
        echo "</table>";
        $cocinero = $array["cocinero"];
        $consultaCocinero = "SELECT * FROM cocinero WHERE nombre = '$cocinero'";
        $resultadoConsultaCocinero = mysqli_query($conexion, $consultaCocinero);
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Sexo</th>";
        echo "<th>Edad</th>";
        echo "<th>Experiencia</th>";
        echo "<th>Especialidad</th>";
        echo "</tr>";
        $arrayCocinero = mysqli_fetch_assoc($resultadoConsultaCocinero);
        echo "<tr>";
        echo "<td>" . $arrayCocinero["nombre"] . "</td>";
        echo "<td>" . $arrayCocinero["telefono"] . "</td>";
        echo "<td>" . $arrayCocinero["sexo"] . "</td>";
        echo "<td>" . $arrayCocinero["edad"] . "</td>";
        echo "<td>" . $arrayCocinero["experiencia"] . "</td>";
        echo "<td>" . $arrayCocinero["especialidad"] . "</td>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>

</html>