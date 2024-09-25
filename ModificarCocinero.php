<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModificarDatos</title>
    <link rel="stylesheet" href="modificardatos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <form action="ModificarCocinero.php" method="post">
        <div class="titulo">
            <h1>MODIFICAR DATOS COCINERO</h1>
        </div>
        <div class="container">
            <div class="contiene-select">
                <select name="cocinero" required>
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
            <label>
                <input type="number" name="edad" placeholder="EDAD" min="18" max="65" required>
            </label>
            <label>
                <input type="number" name="años_experiencia" placeholder="AÑOS DE EXPERIENCIA" min="0" max="46" required>
            </label>
            <div class="contiene-select">
                ESPECIALIDAD <i class="fa-solid fa-bowl-food"></i>
                <select name="especialidad" required>
                    <?php
                    $conexion = conectar("localhost", "root", "", "restaurant");
                    $select = "SELECT DISTINCT especialidad FROM cocinero";
                    $resultado = mysqli_query($conexion, $select);
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value=\"" . $fila["especialidad"] . "\">" . $fila["especialidad"] . "</option>";
                    }
                    ?>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <input type="submit" value="MODIFICAR">
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST["cocinero"])) {
    $conexion = conectar("localhost", "root", "", "restaurant");
    $cocinero = $_POST["cocinero"];
    $edad = $_POST["edad"];
    $años_experiencia = $_POST["años_experiencia"];
    $especialidad = $_POST["especialidad"];

    $update = "UPDATE cocinero SET edad = $edad, experiencia = $años_experiencia, especialidad = '$especialidad' WHERE nombre = '$cocinero'";
    $resultado = mysqli_query($conexion, $update);

    if ($resultado) {
        echo"<p class=\"mensaje\">Los datos del cocinero se han modificado exitosamente.</p>";
    }
}
?>