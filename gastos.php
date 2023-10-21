<?php include 'menu.php'; ?>
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar y Mostrar Gastos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/menu.css">
    <style>
        body {
            background-image: url('1.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<form action="insertar-gastos.php" method="post">
        <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
            <div style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 5px;">
                <h1 style="text-align: center; color: #007bff; font-weight: bold;">Datos de registro de gastos</h1>
                <table class="table caption-top">
                    <thead>
                        <tr>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">VALOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-2"><input type="text" name="nombre" class="form-control" placeholder="Nombre"></td>
                            <td class="col-md-2"><input type="text" name="valor" class="form-control" placeholder="Valor"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div style="display: flex; justify-content: center;">
                    <input type="submit" value="Registrar" style="background-color: #007bff; color: white; font-weight: bold; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                </div>
                <!-- Mostrar los gastos registrados -->
                <div style="margin-top: 30px; text-align: center; background-color: white; padding: 20px;">
                    <?php include 'mostrar-gastos.php'; ?>
                </div>
                </br>
            </div>
        </div>
    </form>
    

</body>
</html>
