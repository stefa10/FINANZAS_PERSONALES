<?php
include 'db.php'; // Incluir el archivo de conexión a la base de datos

$id_usuario = $_SESSION['id_usuario'];
// Realizar consulta a la base de datos para obtener datos de gastos
$queryGastos = "SELECT * FROM gastos where id_usuario='$id_usuario'";
$resultGastos = mysqli_query($conexion, $queryGastos);

// Generar la tabla HTML de gastos
echo '<table>';
echo '<tr><th>Nombre</th><th>Valor</th></tr>';
while ($row = mysqli_fetch_assoc($resultGastos)) {
    echo '<tr><td>' . $row['nombre'] . '</td><td>' . $row['valor'] . '</td></tr>';
}
echo '</table>';
?>
