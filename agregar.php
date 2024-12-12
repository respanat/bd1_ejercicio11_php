<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_estado_articulo = $_POST['id_estado_articulo'];
    $precio_inicial = $_POST['precio_inicial'];
    $fecha_limite = $_POST['fecha_limite'];
    $id_usuario = $_POST['id_usuario'];
    $id_categoria = $_POST['id_categoria'];

    $sql = "INSERT INTO Articulo (nombre, descripcion, id_estado_articulo, precio_inicial, fecha_limite, id_usuario, id_categoria)
            VALUES ('$nombre', '$descripcion', $id_estado_articulo, $precio_inicial, '$fecha_limite', $id_usuario, $id_categoria)";
    if ($conn->query($sql) === TRUE) {
        echo "Registro agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar un nuevo articulo</h1>
        <form action="agregar.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea><br>
            <label for="id_estado_articulo">Estado:</label>
            <input type="number" id="id_estado_articulo" name="id_estado_articulo" required><br>
            <label for="precio_inicial">Precio Inicial:</label>
            <input type="number" step="0.01" id="precio_inicial" name="precio_inicial" required><br>
            <label for="fecha_limite">Fecha Límite:</label>
            <input type="date" id="fecha_limite" name="fecha_limite" required><br>
            <label for="id_usuario">Usuario:</label>
            <input type="number" id="id_usuario" name="id_usuario" required><br>
            <label for="id_categoria">Categoría:</label>
            <input type="number" id="id_categoria" name="id_categoria" required><br>
            <button type="submit">Agregar</button>
        </form>
    </div>
</body>
</html>
<!-- Botón para regresar al menú principal -->
<div style="margin-top: 20px;">
    <a href="index.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Regresar al Menú Principal</a>
</div>

