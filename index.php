<?php
    // Datos de conexión a la base de datos remota de Azure
    $host = 'servidor-sis-riego-chido.mysql.database.azure.com';
    $username = 'chalinosanchez';
    $password = 'Ch4l1n0S4nch3z';
    $dbname = 'sistemariego';

    try {
        // Crear la conexión PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Establecer el modo de error de PDO para lanzar excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar y ejecutar la consulta
        $sql = 'SELECT * FROM prueba';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Obtener los resultados como un array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>

<!--Estructura HTML-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Riego</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                margin: 20px auto;
                background: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            h1 {
                text-align: center;
                color: #333;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:hover {
                background-color: #f1f1f1;
            }
            .no-results {
                text-align: center;
                padding: 20px;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Datos del Sistema de Riego</h1>
            <?php if (count($results)>0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Humedad (%)</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><?php echo $row['fechaActual']; ?></td>
                                <td><?php echo $row['porcHumedad']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-results">No se encontraron resultados.</p>
            <?php endif; ?>
        </div>
    </body>
</html>
