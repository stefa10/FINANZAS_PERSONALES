<?php
include('db.php');
$nombre = $_POST['nombre'];
$valor = $_POST['valor'];
session_start();

$conexion = mysqli_connect("localhost", "root", "", "finanzas");
$id_usuario = $_SESSION['id_usuario'];
$insertar = "INSERT INTO gastos (nombre, valor, id_usuario) values ('$nombre', '$valor','$id_usuario')";

$resultado = mysqli_query($conexion, $insertar);

if ($resultado) {
    header("location:gastos.php");
} else {
    include("gastos.php");
?>
    <h1 class="bad">ERROR AL INSERTAR</h1>
<?php
}

// Mostrar los ingresos en la base de datos
$consulta = "SELECT * FROM gastos where";
$resultadoConsulta = mysqli_query($conexion, $consulta);
?>
<?php
mysqli_free_result($resultado);
mysqli_free_result($resultadoConsulta);
mysqli_close($conexion);
?>
