<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Articulo WHERE id_articulo = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Registro</h1>
        <form action="delete.php" method="GET">
            <label for="id">ID del Registro a Eliminar:</label>
            <input type="number" id="id" name="id" required><br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
