<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EscogerCocinero</title>
    <link rel="stylesheet" href="Escoger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tablas.css">
</head>

<body>
    <form action="EscogerCocinero.php" method="POST">
        <div class="titulo">
            <h1>ESCOGER COCINERO</h1>
        </div>
        <div class="container">
            <div class="contiene-select">
                <select name="cocinero">
                    <?php
                    require "bbdd.php";
                    $conexion = conectar("localhost", "root", "", "restaurant");
                    $select = "SELECT nombre FROM cocinero";
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
    if (isset($_REQUEST["cocinero"])) {
        $nombreCocinero = $_REQUEST["cocinero"];
        $consulta = "SELECT * FROM cocinero WHERE nombre = '$nombreCocinero'";
        $resultadoConsulta = mysqli_query($conexion, $consulta);
        echo '<table>';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Teléfono</th>';
        echo '<th>Sexo</th>';
        echo '<th>Edad</th>';
        echo '<th>Experiencia</th>';
        echo '<th>Especialidad</th>';
        echo '</tr>';
        $array = mysqli_fetch_assoc($resultadoConsulta);
        echo '<tr>';
        echo "<td>" . $array["nombre"] . "</td>";
        echo "<td>" . $array["telefono"] . "</td>";
        echo "<td>" . $array["sexo"] . "</td>";
        echo "<td>" . $array["edad"] . "</td>";
        echo "<td>" . $array["experiencia"] . "</td>";
        echo "<td>" . $array["especialidad"] . "</td>";
        echo '</tr>';
        echo '</table>';
    }
    ?>
</body>

</html>