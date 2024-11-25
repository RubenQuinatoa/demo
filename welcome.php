<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html"); // Redirigir si no está autenticado
    exit();
}

echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
echo '<a href="logout.php">Cerrar sesión</a>';
?>