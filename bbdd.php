<?php

function conectar($host, $usuario, $contraseña, $baseDeDatos) {
    $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDeDatos);
    if(!$conexion) {
        echo "Error al conectar: ".mysqli_connect_error($conexion);
    } 
    return $conexion;
}

function insertarPlato($conexion, $nombre, $tipo, $precio, $cocinero) {
    $insert = "INSERT INTO plato (nombre, tipo, precio, cocinero)
                VALUES (\"$nombre\", \"$tipo\", $precio, \"$cocinero\")";
    if (mysqli_query($conexion, $insert)) {
        $mensaje = "Se ha insertado un plato correctamente.";
    } else {
        mysqli_error($conexion);
    }
    return $mensaje;
}

function insertarUsuario($conexion, $nombre, $telefono, $sexo, $edad, $experiencia, $especialidad) {
    $insert = "INSERT INTO cocinero (nombre, telefono, sexo, edad, experiencia, especialidad)
               VALUES (\"$nombre\", $telefono, \"$sexo\", \"$edad\", $experiencia, \"$especialidad\")";
    if(mysqli_query($conexion, $insert)) {
        $mensaje = "Usuario insertado correctamente.";
    } else {
        $mensaje = mysqli_error($conexion);
    }
    return $mensaje;
}

function borrarCocinero($conexion, $nombreCocinero) {
    $delete = "DELETE FROM cocinero WHERE nombre = '$nombreCocinero'";
    if(mysqli_query($conexion, $delete)) {
        $mensaje = "El cocinero ha sido borrado correctamente.";
    } else {
        $mensaje = mysqli_error($conexion);
    }
    return $mensaje;
}

function borrarPlato($conexion, $nombrePlato) {
    $delete = "DELETE FROM plato WHERE nombre = '$nombrePlato'";
    if(mysqli_query($conexion, $delete)) {
        $mensaje = "El plato ha sido borrado correctamente.";
    } else {
        return mysqli_error($conexion);
    }
    return $mensaje;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}
?>