<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles del ingreso según el ID
    $consulta = "SELECT * FROM gastos WHERE id = $id";
    $resultadoConsulta = mysqli_query($conexion, $consulta);

    if ($resultadoConsulta) {
        $ingreso = mysqli_fetch_assoc($resultadoConsulta);
    } else {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
} else {
    header('Location: gastos.php'); // Redirigir si no se proporciona un ID válido
}

if (isset($_POST['editar'])) {
    // Recuperar los valores editados del formulario
    $nuevoNombre = $_POST['nombre'];
    $nuevoValor = $_POST['valor'];

    // Actualizar los valores del ingreso en la base de datos
    $actualizarConsulta = "UPDATE gastos SET nombre = '$nuevoNombre', valor = '$nuevoValor' WHERE id = $id";
    $resultadoActualizar = mysqli_query($conexion, $actualizarConsulta);

    if ($resultadoActualizar) {
        header('Location: gastos.php'); // Redirigir después de la edición
    } else {
        die("Error en la actualización: " . mysqli_error($conexion));
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gastos</title>
    <link rel="stylesheet" href="CSS/grafica.css">
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
    <h1 style="text-align: center; color: #007bff; font-weight: bold;">Editar Gasto</h1>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $ingreso['nombre']; ?>"><br><br>
        
        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="<?php echo $ingreso['valor']; ?>"><br><br>
        
        <input type="submit" name="editar" value="Guardar Cambios" > 
    </form>
    <br>
    <a href="gastos.php" style="margin-top: 30px; text-align: center; background-color: blue; padding: 20px; color: white; font-weight: bold;">Volver</a>
 
</body>
</html>
