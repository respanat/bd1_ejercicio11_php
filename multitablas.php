<?php
require_once 'connect.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    // Consulta multitabla con alias para facilitar la lectura
    $sql = "
        SELECT 
            Articulo.id_articulo AS ID,
            Articulo.nombre AS Nombre,
            Articulo.descripcion AS Descripción,
            EstadoArticulo.estado_articulo AS Estado,
            Articulo.precio_inicial AS Precio,
            Articulo.fecha_limite AS Fecha,
            Usuario.nombre AS Usuario,
            Categoria.nombre AS Categoría
        FROM Articulo
        INNER JOIN EstadoArticulo ON Articulo.id_estado_articulo = EstadoArticulo.id_estado_articulo
        INNER JOIN Usuario ON Articulo.id_usuario = Usuario.id_usuario
        INNER JOIN Categoria ON Articulo.id_categoria = Categoria.id_categoria
        WHERE $campo LIKE '%$valor%'
    ";

    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Multitabla</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Consultas Multitabla</h1>
        <form action="multitablas.php" method="POST">
            <label for="campo">Campo:</label>
            <select id="campo" name="campo" required>
                <option value="Articulo.nombre">Nombre del Artículo</option>
                <option value="EstadoArticulo.estado_articulo">Estado del Artículo</option>
                <option value="Usuario.nombre">Nombre del Usuario</option>
                <option value="Categoria.nombre">Categoría</option>
            </select><br>

            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" required><br>

            <button type="submit">Buscar</button>
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
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['Descripción']; ?></td>
                        <td><?php echo $row['Estado']; ?></td>
                        <td><?php echo $row['Precio']; ?></td>
                        <td><?php echo $row['Fecha']; ?></td>
                        <td><?php echo $row['Usuario']; ?></td>
                        <td><?php echo $row['Categoría']; ?></td>
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