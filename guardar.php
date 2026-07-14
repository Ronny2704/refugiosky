<?php
// 1. Configuración de conexión
$host = "localhost";
$user = "root";
$pass = "";
$db   = "refugio_sky"; // Confirmado en tu imagen image_7a5b01.png

$conexion = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 2. Recibir datos del formulario
$nombre_usuario  = mysqli_real_escape_string($conexion, $_POST['nombre_usuario']);
$direccion_envio = mysqli_real_escape_string($conexion, $_POST['direccion_envio']);
$nombre_huron    = mysqli_real_escape_string($conexion, $_POST['nombre_huron']);
$item_comprado   = mysqli_real_escape_string($conexion, $_POST['item_comprado']);

// 3. Insertar en la tabla 'registros' (Confirmada en tu imagen image_7a5b42.png)
$sql = "INSERT INTO registros (nombre_usuario, direccion_envio, nombre_huron, item_comprado) 
        VALUES ('$nombre_usuario', '$direccion_envio', '$nombre_huron', '$item_comprado')";

// 4. Ejecutar y mostrar alerta
if (mysqli_query($conexion, $sql)) {
    // Corregí las comillas aquí para que el navegador lo interprete como JavaScript real
    echo "<script>
            alert('¡Datos guardados con éxito!');
            localStorage.removeItem('carrito');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>