<?php
// Incluye el archivo de conexión
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Base de Datos</h1>
        <ul class="menu">
            <li><a href="agregar.php">Agregar Registro</a></li>
            <li><a href="listar.php">Mostrar Registros</a></li>
            <li><a href="multitablas.php">Consultas Multitablas</a></li>
            <li><a href="buscaavanzada.php">Consultas Avanzadas</a></li>
            <li><a href="buscaordenada.php">Consultas Ordenadas</a></li>
        </ul>
    </div>
</body>
</html>
