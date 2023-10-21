<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles del ingreso según el ID
    $consulta = "SELECT * FROM metas WHERE id = $id";
    $resultadoConsulta = mysqli_query($conexion, $consulta);

    if ($resultadoConsulta) {
        $ingreso = mysqli_fetch_assoc($resultadoConsulta);
    } else {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
} else {
    header('Location: metas.php'); // Redirigir si no se proporciona un ID válido
}

if (isset($_POST['eliminar'])) {
    // Eliminar el ingreso de la base de datos
    $eliminarConsulta = "DELETE FROM metas WHERE id = $id";
    $resultadoEliminar = mysqli_query($conexion, $eliminarConsulta);

    if ($resultadoEliminar) {
        header('Location: metas.php'); // Redirigir después de la eliminación
    } else {
        die("Error en la eliminación: " . mysqli_error($conexion));
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Ingreso</title>
    <link rel="stylesheet" href="CSS/grafica.css"> <!-- Agregar el estilo grafica.css -->
    <style>
        body {
            background-image: url('marmol.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    
    <form action="" method="post">
        <h1 style="text-align: center; color: #007bff; font-weight: bold;">Eliminar Meta</h1>
        <p style="text-align: center; color: black; font-weight: bold;">¿Estás seguro de que deseas eliminar la meta con nombre  <?php echo $ingreso['nombre']; ?>?</p>    
        <input type="submit" name="eliminar" value="Eliminar"> 
    </form>
    <br>
    <a href="metas.php" style="margin-top: 30px; text-align: center; background-color: blue; padding: 20px; color: white; font-weight: bold;" >Cancelar</a> 
</body>
</html>
