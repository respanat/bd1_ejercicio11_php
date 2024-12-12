<?php
require_once 'connect.php';

// Consulta para obtener todos los registros para la lista desplegable
$sql = "SELECT id_articulo, nombre FROM Articulo"; // Cambia el nombre de la tabla y los campos si es necesario
$result = $conn->query($sql);

// Comprobamos si hay registros
if ($result->num_rows > 0) {
    echo "<h1>Buscar Artículo</h1>";
    echo "<form action='listar.php' method='GET'>";
    echo "<label for='id_articulo'>Selecciona un Artículo: </label>";
    echo "<select name='id_articulo' id='id_articulo'>";
    
    // Mostrar los registros en la lista desplegable
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_articulo'] . "'>" . $row['nombre'] . "</option>";
    }
    
    echo "</select>";
    echo "<button type='submit'>Buscar</button>";
    echo "</form>";
    
    // Realizar la búsqueda si se selecciona un artículo
    if (isset($_GET['id_articulo']) && is_numeric($_GET['id_articulo'])) {
        $id_articulo = $_GET['id_articulo'];
        
        // Consulta para mostrar el artículo seleccionado
        $search_sql = "SELECT * FROM Articulo WHERE id_articulo = $id_articulo";
        $search_result = $conn->query($search_sql);
        
        if ($search_result->num_rows > 0) {
            // Mostrar los resultados de la búsqueda
            echo "<h2>Detalles del Artículo Seleccionado</h2>";
            while ($row = $search_result->fetch_assoc()) {
                echo "<p><strong>ID:</strong> " . $row['id_articulo'] . "</p>";
                echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
                echo "<p><strong>Descripción:</strong> " . $row['descripcion'] . "</p>";
            }
        } else {
            echo "<p>No se encontró el artículo seleccionado.</p>";
        }
    }
} else {
    echo "No hay registros en la base de datos.";
}
?>

<div style="margin-top: 20px;">
    <a href="index.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px;">Regresar al Menú Principal</a>
</div>
