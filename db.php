<?php
$conexion = mysqli_connect("localhost", "root", "", "finanzas");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
