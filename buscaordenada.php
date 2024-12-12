<?php
require_once 'connect.php';

// Obtener los nombres de las columnas de la tabla "Articulo"
$columns = [];
$sql = "SHOW COLUMNS FROM Articulo";
$resultColumns = $conn->query($sql);
if ($resultColumns) {
    while ($row = $resultColumns->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

$result = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $orden = $_POST['orden'];

    // Validar que el campo seleccionado es válido
    if (in_array($campo, $columns) && in_array($orden, ['ASC', 'DESC'])) {
        $sql = "SELECT * FROM Articulo ORDER BY `$campo` $orden";
        $result = $conn->query($sql);
    } else {
        echo "<p style='color:red;'>Campo o tipo de orden no válido.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Ordenadas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Consultas Ordenadas</h1>
        <form action="buscaordenada.php" method="POST">
            <label for="campo">Campo:</label>
            <select id="campo" name="campo" required>
                <option value="">Seleccione un campo</option>
                <?php foreach ($columns as $column): ?>
                    <option value="<?php echo $column; ?>">
                        <?php echo ucfirst($column); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="orden">Orden:</label>
            <select id="orden" name="orden" required>
                <option value="">Seleccione el orden</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>
            </select><br>

            <button type="submit">Consultar</button>
        </form>

        <?php if ($result && $result->num_rows > 0): ?>
            <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Categoría</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_articulo']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['id_estado_articulo']; ?></td>
                        <td><?php echo $row['precio_inicial']; ?></td>
                        <td><?php echo $row['fecha_limite']; ?></td>
                        <td><?php echo $row['id_usuario']; ?></td>
                        <td><?php echo $row['id_categoria']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php elseif ($result): ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<!-- Botón para regresar al menú principal -->
<div style="margin-top: 20px;">
    <a href="index.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Regresar al Menú Principal</a>
</div>