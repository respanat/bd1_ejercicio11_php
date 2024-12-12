<?php
require_once 'connect.php';
$sql = "SELECT * FROM Articulo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Registros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Registros</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Fecha Límite</th>
                <th>Usuario</th>
                <th>Categoría</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_articulo'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['descripcion'] ?></td>
                        <td><?= $row['id_estado_articulo'] ?></td>
                        <td><?= $row['precio_inicial'] ?></td>
                        <td><?= $row['fecha_limite'] ?></td>
                        <td><?= $row['id_usuario'] ?></td>
                        <td><?= $row['id_categoria'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">No hay registros</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
