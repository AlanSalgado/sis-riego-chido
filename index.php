<?php
    $host = 'servidor-sis-riego-chido.mysql.database.azure.com';
    $username = 'chalinosanchez';
    $password = 'Ch4l1n0S4nch3z';
    $dbname = 'sistemariego'; 
 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Connected to $dbname at $host successfully.";
        $sql = "SELECT * FROM prueba"; // Cambia esto
        echo "CONEXION EXITOSA";
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>
