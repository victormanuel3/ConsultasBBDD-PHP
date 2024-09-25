<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MostrarPlatosCocinero</title>
    <link rel="stylesheet" href="Escoger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tablas.css">
</head>

<body>
    <form action="MostrarPlatosCocinero.php" method="POST">
        <div class="titulo">
            <h1>Mostrar platos cocinero</h1>
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
    if (isset($_POST["cocinero"])) {
        $cocinero = $_POST["cocinero"];
        $consulta = "SELECT nombre, tipo, precio FROM plato WHERE cocinero = '$cocinero'";
        $resultado = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado) == 0) {
            echo "<p class=\"mensaje\">Este cocinero no ha creado ningún plato.</p>";
        } else {
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Tipo</th>";
            echo "<th>Precio</th>";
            echo "</tr>";
            while ($array = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $array["nombre"] . "</td>";
                echo "<td>" . $array["tipo"] . "</td>";
                echo "<td>" . $array["precio"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>

</html>