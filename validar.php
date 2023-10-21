<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conexion = mysqli_connect("localhost", "root", "", "finanzas");

    $consulta = "SELECT * FROM usuarios WHERE nombre='$usuario' AND contrasena='$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario_data = mysqli_fetch_assoc($resultado);
        session_start();
        $_SESSION['id_usuario'] = $usuario_data['id']; // Aquí almacenamos el id en la sesión
        header("Location: home.php"); // Redirigir a la página de inicio si la autenticación es exitosa
        exit;
    } else {
        ?>
        <?php
        include("index.php");
    
      ?>
      <h1 class="bad">ERROR DE AUTENTIFICACION, USUARIO O CONTRASEÑA INCORRECTOS</h1>
      <?php
       // header("Location: index.php");
    }

    mysqli_close($conexion);
}
?>