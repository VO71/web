<?php

// Incluir la conexión a la base de datos
include 'conexion.php';

//Verificar si la solicitud es de tipo POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['userEmail'];
    $contrasena = $_POST['userPassword'];

    
    if (empty($correo) || empty($contrasena)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Verificar el correo en la base de datos
    $sql = "SELECT contrasena FROM usuarios WHERE correo_electronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($hashed_password && password_verify($contrasena, $hashed_password)) {
        echo "Inicio de sesión exitoso.";
    } else {
        echo "Credenciales incorrectas.";
    }

    $stmt->close();
}
?>
