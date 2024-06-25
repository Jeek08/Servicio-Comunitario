<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "cdi";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST['cantidad'];
    $nombre = $_POST['nombre'];
    $mg_ml_vencimiento = $_POST['mg_ml_vencimiento'];
    $lote = $_POST['lote'];

    $sql = "INSERT INTO `s.social` (Cantidad, Nombre, `Mg/Ml/Vencimiento`, Lote) VALUES ('$cantidad', '$nombre', '$mg_ml_vencimiento', '$lote')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
