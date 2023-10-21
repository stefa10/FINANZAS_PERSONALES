<?php
include 'db.php'; // Incluir el archivo de conexión a la base de datos

// Realizar consulta a la base de datos para obtener datos de ingresos
$id_usuario = $_SESSION['id_usuario'];
// Realizar consulta a la base de datos para obtener datos de ingresos
$queryMetas = "SELECT * FROM metas where id_usuario='$id_usuario'";
$resultMetas = mysqli_query($conexion, $queryMetas);

// Generar la tabla HTML de ingresos
echo '<table>';
echo '<tr><th>Nombre</th><th>Valor</th><th>Abono inicial</th><th>Abonos</th></tr>';
while ($row = mysqli_fetch_assoc($resultMetas)) {
    echo '<tr><td>' . $row['nombre'] . '</td><td>' . $row['valor'] . '</td><td>' . $row['abono_inicial'] . '</td><td>' . $row['abono'] . '</td></tr>';
}

echo '</table>';
?>
