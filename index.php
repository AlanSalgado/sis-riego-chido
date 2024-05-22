<?php
$servername = "servidor-sis-riego-chido.mysql.database.azure.com"; // Cambia esto
$username = "chalinosanchez"; // Cambia esto
$password = "Ch4l1n0S4nch3z"; // Cambia esto
$dbname = "sistemariego"; // Cambia esto

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM prueba"; // Cambia esto
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "humedad: " . $row["humedad"]. " - regado: " . $row["regado"]. " " . $row["apellido"]. "<br>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
