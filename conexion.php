<?php
//Parámetros 
$host = 'localhost'; 
$db = 'iniciosesion'; 
$user = 'root'; // Usuario de la base de datos
$pass = ''; 


$conn = new mysqli($host, $user, $pass, $db);

// Verificar 
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
