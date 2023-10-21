<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles del ingreso según el ID
    $consulta = "SELECT * FROM metas WHERE id = $id";
    $resultadoConsulta = mysqli_query($conexion, $consulta);

    if ($resultadoConsulta) {
        $meta = mysqli_fetch_assoc($resultadoConsulta);
    } else {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
} else {
    header('Location: metas.php'); // Redirigir si no se proporciona un ID válido
}

if (isset($_POST['abonar'])) {
    $abono = floatval($_POST['abono']);

    if ($abono > 0 && $abono <= $meta['saldo']) {
        $abonoActualizado = $meta['abono'] + $abono;
        $saldoActualizado = $meta['saldo'] - $abono;

        // Actualizar los valores de abono y saldo en la base de datos
        $actualizarAbonoSaldo = "UPDATE metas SET abono = $abonoActualizado, saldo = $saldoActualizado WHERE id = $id";
        $resultadoActualizar = mysqli_query($conexion, $actualizarAbonoSaldo);

        if ($resultadoActualizar) {
            header('Location: metas.php'); // Redirigir después del abono
        } else {
            die("Error en la actualización: " . mysqli_error($conexion));
        }
    } else {
        $errorMensaje = "El abono no es válido. Asegúrate de que sea mayor que cero y no exceda el saldo.";
        echo "<script>alert('$errorMensaje');</script>";
    }
}

mysqli_close($conexion);
?>

<!-- Resto del código HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/grafica.css">
<title>Abonar a meta</title>
    <style>
        body {
            background-image: url('marmol.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
    
        h1 {
            color: #007bff;
            font-weight: bold;
            font-size: 50px;
        }
        label {
            color: white;
            font-weight: bold;
            font-size: 30px;
            display: block;
            margin-top: 20px;
        }
        p {
            font-weight: bold;
            font-size: 26px;
            color: black;
        }
    </style>
</head>
<body>
    <h1>Abonar Meta</h1>
    
    <!-- Mostrar detalles de la meta -->
    <p>Nombre: <?php echo $meta['nombre']; ?></p>
    <p>Valor: <?php echo $meta['valor']; ?></p>
    <p>Saldo: <?php echo $meta['saldo']; ?></p>

    <!-- Formulario para realizar abono -->
    <form action="" method="post">
        <label for="abono">Abonar:</label>
        <input type="text" name="abono"><br>
        
        <input type="submit" name="abonar" value="Realizar Abono"> 
    </form>
    
    <!-- Botones -->
    <div class="buttons">
        <a href="metas.php" style="background-color: blue; padding: 5px 10px; color: white; font-weight: bold; text-decoration: none;">Volver</a>
    </div>
</body>
</html>
