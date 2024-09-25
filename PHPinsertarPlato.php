<?php
require_once "bbdd.php";
$conexion = conectar("localhost", "root", "", "restaurant");

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $cocinero = $_POST["cocinero"];
    
    $select = "SELECT nombre FROM plato WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $select);

    if (mysqli_num_rows($resultado) == 0) {
        insertarPlato($conexion, $nombre, $tipo, $precio, $cocinero);
        header("Location: InsertarPlato.php");
    } else {
        header("Location: formularioErrorPlato.php");
    }
}

?>