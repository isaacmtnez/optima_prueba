<?php
// Incluir el archivo de configuración de la base de datos
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Almacenar ID del empleado recibido por GET y las fechas de inicio y fin si existen
    $empleadoID = $_GET['empleadoID'];
    $fechaInicio = $_GET['fechaInicio'] ?? null;
    $fechaFin = $_GET['fechaFin'] ?? null;

    // Preparar y ejecutar consulta para obtener los registros de asistencia del empleado
    if ($fechaInicio && $fechaFin) {
        // Si se reciben fechas de inicio y fin, buscar registros entre esas fechas
        $stmt = $pdo->prepare("SELECT * FROM registros_asistencia WHERE empleado_id = ? AND fecha BETWEEN ? AND ?");
        $stmt->execute([$empleadoID, $fechaInicio, $fechaFin]);
    } else {
        // Si no se reciben fechas, buscar todos los registros del empleado
        $stmt = $pdo->prepare("SELECT * FROM registros_asistencia WHERE empleado_id = ?");
        $stmt->execute([$empleadoID]);
    }

    // Almacenar los registros y devolverlos como JSON
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($registros);
}
?>