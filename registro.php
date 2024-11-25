<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validación básica
    if (empty($username) || strlen($username) < 3 || strlen($username) > 20) {
        die("El nombre de usuario debe tener entre 3 y 20 caracteres.");
    }

    if (empty($password) || strlen($password) < 6) {
        die("La contraseña debe tener al menos 6 caracteres.");
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta para insertar el usuario
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $passwordHash);

    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
        // Redirigir al login
        header("Location: login.php");
        exit();
    } else {
        if ($conn->errno == 1062) { // Código de error para duplicados en MySQL
            echo "El nombre de usuario ya está registrado.";
        } else {
            echo "Error al registrar usuario: " . $stmt->error;
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
