<?php
include 'db.php'; // Incluir el archivo de conexión a la base de datos

$id_usuario = $_SESSION['id_usuario'];
// Realizar consultas a la base de datos para obtener datos de ingresos y gastos
$queryIngresos = "SELECT * FROM ingresos where id_usuario='$id_usuario'";
$resultIngresos = mysqli_query($conexion, $queryIngresos);

$queryGastos = "SELECT * FROM gastos where id_usuario='$id_usuario'";
$resultGastos = mysqli_query($conexion, $queryGastos);

// Calcular el total de ingresos y gastos
$totalIngresos = 0;
while ($row = mysqli_fetch_assoc($resultIngresos)) {
    $totalIngresos += $row['valor'];
}

$totalGastos = 0;
while ($row = mysqli_fetch_assoc($resultGastos)) {
    $totalGastos += $row['valor'];
}

// Consulta para obtener el total de abonos desde la tabla "metas"
$queryAbonos = "SELECT SUM(abono + abono_inicial) AS total_abonos FROM metas where id_usuario='$id_usuario'";
$resultAbonos = mysqli_query($conexion, $queryAbonos);
$rowAbonos = mysqli_fetch_assoc($resultAbonos);
$totalAbonos = $rowAbonos['total_abonos'];

// Calcular el margen de utilidad
$margen_utilidad = $totalIngresos - ($totalGastos + $totalAbonos);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informe Financiero</title>
    <script>
        // Mostrar mensaje si el margen de utilidad es negativo
        window.onload = function() {
            var margenUtilidad = <?php echo $margen_utilidad; ?>;
            if (margenUtilidad < 0) {
                alert("Cuidado, estás en pérdida");
            }
        };
    </script>
</head>
<body>
    <div style="background-color: white; padding: 20px; width: 40%; margin: 0 auto;">
        <!-- Mostrar los totales de ingresos, gastos y abonos -->
        <p style="-webkit-text-stroke: 1px blue; -webkit-text-fill-color: black; font-size: 20px;">Total de Ingresos: <?php echo $totalIngresos; ?></p>
        <p style="-webkit-text-stroke: 1px red; -webkit-text-fill-color: black; font-size: 20px;">Total de Gastos: <?php echo $totalGastos; ?></p>
        <p style="-webkit-text-stroke: 1px green; -webkit-text-fill-color: black; font-size: 20px;">Total de Abonos a metas: <?php echo $totalAbonos; ?></p>
    
        <!-- Mostrar el margen de utilidad -->
        <p style="-webkit-text-stroke: 1px black; -webkit-text-fill-color: black; font-size: 20px;">Margen de Utilidad: <?php echo $margen_utilidad; ?></p>
    </div>
</body>

</html>
