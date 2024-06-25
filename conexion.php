<?php
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

$sql = "SELECT lote, medicamento, ml_mg, vencimiento, cantidad FROM seguro_social";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
