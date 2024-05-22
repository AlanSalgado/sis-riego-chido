<?php
    $host = 'servidor-sis-riego-chido.mysql.database.azure.com';
    $username = 'chalinosanchez';
    $password = 'Ch4l1n0S4nch3z';
    $dbname = 'sistemariego'; 
 
    try {
        // Crear una conexión PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Establecer el modo de error de PDO para lanzar excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected to $dbname at $host successfully.<br>";

        // Preparar y ejecutar la consulta
        $sql = 'SELECT * FROM prueba';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Obtener los resultados como un array asociativo
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Comprobar si se obtuvieron resultados
        if (count($results) > 0) {
            // Iterar sobre los resultados y mostrarlos
            foreach ($results as $row) {
                echo 'Fecha: ' . $row['fechaActual'] . ', Humedad: ' . $row['porcHumedad'] . ', Descripción: ' . $row['descripcion'] . '<br>';
            }
        } else {
            echo 'No se encontraron resultados.';
        }
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>
