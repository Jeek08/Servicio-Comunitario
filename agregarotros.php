<?php
$servername = "localhost";
$username = "root"; // Cambia a tu usuario de MySQL
$password = "admin"; // Cambia a tu contraseña de MySQL
$dbname = "inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lote = isset($_POST['lote']) ? $_POST['lote'] : '';
    $medicamento = isset($_POST['medicamento']) ? $_POST['medicamento'] : '';
    $ml_mg = isset($_POST['ml_mg']) ? $_POST['ml_mg'] : '';
    $vencimiento = isset($_POST['vencimiento']) ? $_POST['vencimiento'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;

    if ($lote && $medicamento && $ml_mg && $vencimiento && $cantidad) {
        $sql = "INSERT INTO otros (lote, medicamento, ml_mg, vencimiento, cantidad) 
                VALUES ('$lote', '$medicamento', '$ml_mg', '$vencimiento', '$cantidad')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Nuevo registro creado con éxito'); window.location.href='otros.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
    }

    $conn->close();
}
?>
