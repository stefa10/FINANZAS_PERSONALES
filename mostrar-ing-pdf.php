<?php
include 'db.php'; // Incluir el archivo de conexión a la base de datos
session_start();
// Realizar consulta a la base de datos para obtener datos de ingresos
$id_usuario = $_SESSION['id_usuario'];
$queryIngresos = "SELECT * FROM ingresos where id_usuario='$id_usuario'";
$resultIngresos = mysqli_query($conexion, $queryIngresos);

// Generar la tabla HTML de ingresos
echo '<table>';
echo '<tr><th>Nombre</th><th>Valor</th></tr>';
while ($row = mysqli_fetch_assoc($resultIngresos)) {
    echo '<tr><td>' . $row['nombre'] . '</td><td>' . $row['valor'] . '</td></tr>';
}
echo '</table>';
?>
