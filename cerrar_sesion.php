<!DOCTYPE html>
<html>
<head>
    <title>Cerrar Sesión</title>
    <link rel="stylesheet" href="CSS/cerrar_sesion.css">
</head>
<body>
    <?php
    // Comprobar si se ha hecho clic en "Aceptar" o "Cancelar"
    if (isset($_POST['aceptar'])) {
        // Si se ha hecho clic en "Aceptar", redirigir al usuario a index.php
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['cancelar'])) {
        // Si se ha hecho clic en "Cancelar", redirigir al usuario a home.php
        header("Location: home.php");
        exit;
    }
    ?>
    <form method='post'>
        <p>¿Desea cerrar su sesión?</p>
        <input type='submit' name='aceptar' value='Aceptar'>
        <input type='submit' name='cancelar' value='Cancelar'>
    </form>
</body>
</html>
