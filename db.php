<?php
// Información para la conexión a la base de datos
$servername = "localhost";  // El servidor de la base de datos (generalmente localhost si es local)
$username = "root";         // El nombre de usuario de la base de datos
$password = "";             // La contraseña para la base de datos (en este caso está vacía si usas 'root' sin contraseña)
$dbname = "demo";           // El nombre de la base de datos (ahora "demo")

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error); // Si falla la conexión, se muestra el error
}
?>
