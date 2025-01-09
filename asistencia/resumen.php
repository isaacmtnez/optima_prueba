<?php
// Incluir el archivo de configuración de la base de datos
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Almacenar ID del empleado recibido por GET y el mes y año a consultar
    $empleadoID = $_GET['empleadoID'];
    $mes = $_GET['mes'];
    $año = $_GET['año'];

    // Preparar y ejecutar consulta para obtener el total de horas trabajadas en el mes y año recibidos
    $stmt = $pdo->prepare("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(total_horas))) as TotalHoras FROM registros_asistencia WHERE empleado_id = ? AND MONTH(fecha) = ? AND YEAR(fecha) = ?");
    $stmt->execute([$empleadoID, $mes, $año]);

    // Almacenar el total de horas y devolverlo como JSON
    $totalHoras = $stmt->fetch(PDO::FETCH_ASSOC)['TotalHoras'];
    echo json_encode(['TotalHoras' => $totalHoras]);
}
?>