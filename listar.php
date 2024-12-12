<?php
require_once 'connect.php';

// Consulta para obtener todos los registros
$sql = "SELECT * FROM Articulo"; // Cambia el nombre de la tabla según tu base de datos
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Artículos</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>";

    // Mostrar cada registro
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id_articulo'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['descripcion'] . "</td>
                <td>
                    <a href='editar.php?id=" . $row['id_articulo'] . "'>Editar</a> |
                    <a href='borrar.php?id=" . $row['id_articulo'] . "' onclick='return confirm(\"¿Estás seguro de que quieres borrar este registro?\")'>Borrar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la base de datos.";
}
?>

<div style="margin-top: 20px;">
    <a href="index.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Regresar al Menú Principal</a>
</div>
