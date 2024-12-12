<?php
require_once 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM Articulo WHERE id_articulo = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
        exit;
    }
} else {
    echo "ID no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Registro</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id_articulo'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= isset($row['nombre']) ? $row['nombre'] : '' ?>" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?= isset($row['descripcion']) ? $row['descripcion'] : '' ?></textarea>
            <!-- Agrega más campos aquí según tus necesidades -->
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>

<div style="margin-top: 20px;">
    <a href="index.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Regresar al Menú Principal</a>
</div>

<div style="margin-top: 22px;">
    <a href="listar.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Cancelar y Regresa al menu anterior</a>
</div>