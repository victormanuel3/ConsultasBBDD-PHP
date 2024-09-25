<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Plato</title>
    <link rel="stylesheet" href="InsertarPlato.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>

<body>
    <form action="PHPinsertarPlato.php" method="POST">
        <div class="titulo">
            <h1>INSERTAR PLATO</h1>
        </div>
        <div class="container">
            <div class="contiene-input">
                <i class="fa-solid fa-bowl-food"></i>
                <input type="text" name="nombre" placeholder="NOMBRE DEL PLATO" required>
            </div>
            <div class="contiene-select">
                <select name="tipo" required>
                    <option value="Plato principal">PLATO PRINCIPAL</option>
                    <option value="Entrante">ENTRANTE</option>
                    <option value="Postre">POSTRE</option>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="contiene-input">
                <i class="fa-solid fa-tag"></i>
                <input type="number" step="0.01" name="precio" placeholder="PRECIO DEL PLATO" required>
            </div>
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
            <input type="submit" value="INSERTAR PLATO">
        </div>
    </form>

</html>