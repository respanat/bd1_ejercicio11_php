<?php
$servername = "localhost";
$username = "user_ramiro_espana";
$password = "AbcdeUdeC";
$dbname = "bd_ramiro_espana_ejercicio11";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
