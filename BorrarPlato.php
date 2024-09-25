<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BorrarPlato</title>
    <link rel="stylesheet" href="Escoger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <form class="form-borrar-plato" action="BorrarPlato.php" method="post">
        <div class="titulo-borrar-plato">
            <h1>ESCOGER PLATO PARA BORRARLO</h1>
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
        $resultado = borrarPlato($conexion, $plato);
        echo "<p class=\"mensaje-borrado\">$resultado</p>";
    }
    ?>
</body>

</html>