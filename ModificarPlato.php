<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModificarPlato</title>
    <link rel="stylesheet" href="modificardatos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <form class="form-modificar-plato" action="ModificarPlato.php" method="post">
        <div class="titulo-escoger-plato">
            <h1 class="h1-modificar-plato">MODIFICAR DATOS PLATO</h1>
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
            <div class="contiene-input">
                <i class="fa-solid fa-tag"></i>
                <input type="number" step="0.01" name="precio" placeholder="PRECIO DEL PLATO" required>
            </div>
            <input type="submit" value="MODIFICAR">
        </div>
    </form>

    <?php
    if (isset($_POST["plato"])) {
        $plato = $_POST["plato"];
        $precio = $_POST["precio"];

        $update = "UPDATE plato SET precio = $precio WHERE nombre = '$plato'";
        $resultado = mysqli_query($conexion, $update);

        if ($resultado) {
            echo"<p class=\"mensaje\">El precio del plato se ha modificado exitosamente.</p>";
        }
    }
    ?>

</body>

</html>