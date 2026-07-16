<?php
// Credenciales actualizadas de tu base de datos en Clever Cloud
$host = "b9cpt7fyf30iyrbla6-mysql.services.clever-cloud.com"; // <-- Aquí cambiamos el 8a por 9c
$user = "u8wrpuivk20twub";
$pass = "l2OkBjQUiolhwueCs2P4"; 
$db   = "b9cpt7fyf30iyrbla6"; // <-- Aquí también cambiamos el 8a por 9c

$conexion = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión a la nube: " . mysqli_connect_error());
}
?>