<?php
include('db.php');
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
session_start();

$conexion=mysqli_connect("localhost","root","","finanzas");

$insertar="INSERT INTO usuarios values ($id,'$nombre','$correo','$contrasena' )";
$resultado=mysqli_query($conexion,$insertar);

//$filas=mysqli_num_rows($resultado);

if($resultado){
  
    header("location:index.php");

}else{
    ?>
    <?php
    include("registrar.php");

  ?>
  <h1 class="bad">ERROR AL INSERTAR</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
