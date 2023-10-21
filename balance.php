<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance de Finanzas</title>
    <link rel="stylesheet" href="CSS/balance.css">
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
    <h1 style="text-align: center; color: #007bff; font-weight: bold; background-color: #fff">Balance de Finanzas</h1>

    <h2 style="text-align: center; color: #00ff00; font-weight: bold; -webkit-text-stroke: 1px black">Ingresos:</h2>
    <?php include 'mostrar-ing-pdf.php'; ?>

    <h2 style="text-align: center; color: red; font-weight: bold; -webkit-text-stroke: 1px black">Gastos:</h2>
    <?php include 'mostrar-gas-pdf.php'; ?>

    <h2 style="text-align: center; color: purple; font-weight: bold; -webkit-text-stroke: 1px black">Metas:</h2>
    <?php include 'mostrar-metas-pdf.php'; ?>

    <h2 style="text-align: center; color: #007bff; font-weight: bold; -webkit-text-stroke: 1px black">Margen de Utilidad:</h2>
    <?php include 'calcular-utilidad.php'; ?>
</body>
</html>
