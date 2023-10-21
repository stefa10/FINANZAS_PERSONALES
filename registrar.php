<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/registrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<form action="insertar-usuario.php" method="post" style="width: 70%; margin: 0 auto; margin-bottom: 30px;">
    <table class="table caption-top">
    <caption style="font-size: 24px; font-weight: bold; color: black; text-align: center;">Datos de registro</caption>
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">CORREO</th>
        <th scope="col">CONTRASEÑA</th>
        </tr>
    </thead>

    <tbody>
    <tr>
        <th scope="row" class="col-md-2"><input type="number" name="id" class="form-control" placeholder="Numero de cedula"></th>
        <td class="col-md-2"><input type="text" name="nombre" class="form-control" placeholder="Nombre"></td>
        <td class="col-md-2"><input type="text" name="correo" class="form-control" placeholder="Correo"></td>
        <td class="col-md-2"><input type="text" name="contrasena" class="form-control" placeholder="Contraseña"></td>
    </tr>
    </tbody>
    
    </table>
    <Br>
    <input type="submit" value="Registrar">  
    </Br>
</form>
</body>
</html>
