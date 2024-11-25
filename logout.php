<?php
session_start();  // Iniciar la sesión

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario al índice (página de inicio)
header("Location: index.html");
exit();
?>
