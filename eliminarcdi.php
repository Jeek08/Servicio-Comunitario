<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia a tu usuario de MySQL
$password = "admin"; // Cambia a tu contraseña de MySQL
$dbname = "inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha recibido el lote para eliminar
if (isset($_GET['lote'])) {
    $lote = $conn->real_escape_string($_GET['lote']);

    // SQL para eliminar el registro
    $sql = "DELETE FROM cdi WHERE lote = '$lote'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "No se ha recibido ningún lote para eliminar";
}

// Cerrar conexión
$conn->close();

// Redirigir de nuevo a la página principal después de la eliminación
header("Location: cdi.php");
exit;
?>
