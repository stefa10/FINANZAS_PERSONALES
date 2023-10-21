<?php
include('db.php');
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

$conexion = mysqli_connect("localhost", "root", "", "finanzas");
$consulta = "SELECT * FROM gastos where id_usuario='$id_usuario'";
$resultadoConsulta = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Gastos</title>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 30px; /* Ajusta el valor para el espacio deseado */
        }

        th {
            font-weight: bold;
            color: blue;
        }

        .acciones {
            display: flex;
            align-items: center;
        }

        .acciones a {
            background-color: blue;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h1 style="font-weight: bold; color: blue;">Gastos Registrados</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Valor</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
        ?>
        <tr>
            <td style="color: blue;"><?php echo $fila['nombre']; ?></td>
            <td style="color: blue;"><?php echo $fila['valor']; ?></td>
            <td class="acciones">
                <a href="editar-gasto.php?id=<?php echo $fila['id']; ?>">Editar</a>
                <a href="eliminar-gasto.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
</body>
</html>

<?php
mysqli_free_result($resultadoConsulta);
mysqli_close($conexion);
?>


