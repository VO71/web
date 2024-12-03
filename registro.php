<?php
//Para registrar la conexion con "ingreso.html"

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['userName'];
    $correo = $_POST['userEmail'];
    $contrasena = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);

    // Validar campos vacíos
    if (empty($nombre) || empty($correo) || empty($contrasena)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Insertar datos 
    $sql = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $contrasena);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
}
?>
