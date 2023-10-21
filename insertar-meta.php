<?php
include('db.php');
$nombre = $_POST['nombre'];
$valor = $_POST['valor'];
$abono_inicial = $_POST['abono_inicial'];
$saldo = $valor - $abono_inicial;
session_start();

$conexion = mysqli_connect("localhost", "root", "", "finanzas");
$id_usuario = $_SESSION['id_usuario'];
$insertar = "INSERT INTO metas (nombre, valor,abono_inicial, saldo, id_usuario) values ('$nombre', '$valor','$abono_inicial', '$saldo','$id_usuario')";
$resultado = mysqli_query($conexion, $insertar);

if ($resultado) {
    header("location:metas.php");
} else {
    include("metas.php");
?>
    <h1 class="bad">ERROR AL INSERTAR</h1>
<?php
}

// Mostrar los ingresos en la base de datos
$consulta = "SELECT * FROM metas";
$resultadoConsulta = mysqli_query($conexion, $consulta);
?>
<?php
mysqli_free_result($resultado);
mysqli_free_result($resultadoConsulta);
mysqli_close($conexion);
?>
