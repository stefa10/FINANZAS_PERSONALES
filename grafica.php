<?php include 'menu.php'; ?>
<?php include 'db.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Ingresos y Gastos</title>
    <link rel="stylesheet" href="CSS/grafica.css">
    <!-- Incluir el archivo de Chart.js desde CDNJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>
    <div style="width: 60%; margin: auto;">
        <h2 style="color: blue; font-weight: bold;">Ingresos</h2>
        <canvas id="myChart" style="width: 400px; height: 400px;"></canvas>
    </div>

    <?php
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "finanzas";

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);
    $id_usuario = $_SESSION['id_usuario'];
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta y almacenamiento de datos de ingresos
    $queryIngresos = "SELECT nombre, valor FROM ingresos where id_usuario='$id_usuario' ORDER BY id";
    $resultIngresos = mysqli_query($conexion, $queryIngresos);

    if (!$resultIngresos) {
        die("Error en la consulta de ingresos: " . mysqli_error($conexion));
    }

    $nombresIngresos = [];
    $valoresIngresos = [];

    while ($row = mysqli_fetch_assoc($resultIngresos)) {
        $nombresIngresos[] = $row['nombre'];
        $valoresIngresos[] = $row['valor'];
    }

    // Consulta y almacenamiento de datos de gastos
    $queryGastos = "SELECT nombre, valor FROM gastos where id_usuario='$id_usuario' ORDER BY id"; // Cambia "gastos" por el nombre real de la tabla de gastos
    $resultGastos = mysqli_query($conexion, $queryGastos);

    if (!$resultGastos) {
        die("Error en la consulta de gastos: " . mysqli_error($conexion));
    }

    $nombresGastos = [];
    $valoresGastos = [];

    while ($row = mysqli_fetch_assoc($resultGastos)) {
        $nombresGastos[] = $row['nombre'];
        $valoresGastos[] = $row['valor'];
    }

    mysqli_close($conexion);
    ?>

    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    
    // Opciones de colores de fondo y bordes
    var backgroundColors = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ];
    
    var borderColors = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ];

    var myChart = new Chart(ctx, {
        type: 'pie', // Tipo de gráfica de torta
        data: {
            labels: <?php echo json_encode($nombresIngresos); ?>,
            datasets: [
                {
                    data: <?php echo json_encode($valoresIngresos); ?>,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }
            ]
        },
        options: {
            // Opciones adicionales para la gráfica de ingresos
        }
    });
    </script>

    <div style="width: 60%; margin: auto;">
        <h2 style="color: blue; font-weight: bold;">Gastos</h2>
        <canvas id="myGastosChart" style="width: 400px; height: 400px;"></canvas>
    </div>

    <script>
    var gastosCtx = document.getElementById('myGastosChart').getContext('2d');

    var myGastosChart = new Chart(gastosCtx, {
        type: 'pie', // Tipo de gráfica de torta
        data: {
            labels: <?php echo json_encode($nombresGastos); ?>,
            datasets: [
                {
                    data: <?php echo json_encode($valoresGastos); ?>,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }
            ]
        },
        options: {
            // Opciones adicionales para la gráfica de gastos
        }
    });
    </script>

</body>
</html>
