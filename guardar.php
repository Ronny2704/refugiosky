<?php
// Permitir que tu GitHub Pages se conecte a este archivo sin bloqueos (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// 1. Importamos la conexión
require_once 'conexion.php';

// 2. Recibir datos de manera segura (ahora incluimos el teléfono)
$nombre_usuario  = mysqli_real_escape_string($conexion, $_POST['nombre_usuario']);
$direccion_envio = mysqli_real_escape_string($conexion, $_POST['direccion_envio']);
$telefono        = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion, $_POST['telefono']) : '';
$nombre_huron    = isset($_POST['nombre_huron']) ? mysqli_real_escape_string($conexion, $_POST['nombre_huron']) : '';
$item_comprado   = isset($_POST['item_comprado']) ? mysqli_real_escape_string($conexion, $_POST['item_comprado']) : '';

// 3. Insertar en la tabla 'registros' incluyendo el teléfono
$sql = "INSERT INTO registros (nombre_usuario, direccion_envio, telefono, nombre_huron, item_comprado) 
        VALUES ('$nombre_usuario', '$direccion_envio', '$telefono', '$nombre_huron', '$item_comprado')";

// 4. Ejecutar y mostrar alerta
if (mysqli_query($conexion, $sql)) {
    echo "<script>
            alert('¡Datos guardados con éxito en la nube!');
            localStorage.removeItem('carrito');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error al guardar en la nube: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>