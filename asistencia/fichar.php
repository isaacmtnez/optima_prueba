<?php
// Incluir el archivo de configuración de la base de datos
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Almacenar ID del empleado recibido por POST y la fecha y hora actual
    $empleadoID = $_POST['empleadoID'];
    $fecha = date('Y-m-d');
    $horaActual = date('H:i:s');

    // Preparar y ejecutar consulta para verificar si el empleado ya fichó hoy y obtener el registro
    $stmt = $pdo->prepare("SELECT * FROM registros_asistencia WHERE empleado_id = ? AND fecha = ?");
    $stmt->execute([$empleadoID, $fecha]);
    $registro = $stmt->fetch();

    if ($registro) {
        // Si el registro existe es que ya fichó hoy

        if ($registro['hora_salida']) {
            // Si el registro tiene hora de salida, mostrar error y no permitir fichar de nuevo
            echo json_encode(['error' => 'Ya has fichado la salida hoy.']);
        } else {
            // Si no tiene hora de salida, registrarla
            $horaEntrada = new DateTime($registro['hora_entrada']);
            $horaSalida = new DateTime($horaActual);

            if ($horaSalida > $horaEntrada) {
                // Validar que la hora de salida sea mayor que la hora de entrada

                // Calcular total de horas trabajadas y pasar a formato HH:MM:SS
                $intervalo = $horaEntrada->diff($horaSalida);
                $totalHoras = $intervalo->format('%H:%I:%S');

                // Crear y ejecutar consulta para actualizar el registro con la hora de salida y total de horas
                $stmt = $pdo->prepare("UPDATE registros_asistencia SET hora_salida = ?, total_horas = ? WHERE id = ?");
                $stmt->execute([$horaActual, $totalHoras, $registro['id']]);
                // Devolver mensaje de éxito
                echo json_encode(['message' => 'Hora de salida registrada.']);
            } else {
                // Si la hora de salida es menor que la hora de entrada, mostrar error
                echo json_encode(['error' => 'La hora de salida debe ser mayor que la hora de entrada.']);
            }
        }
    } else {
        // Si el empleado no ha fichado hoy, registrar hora de entrada

        // Crear y ejecutar consulta para insertar nuevo registro
        $stmt = $pdo->prepare("INSERT INTO registros_asistencia (empleado_id, fecha, hora_entrada) VALUES (?, ?, ?)");
        $stmt->execute([$empleadoID, $fecha, $horaActual]);
        // Devolver mensaje de éxito
        echo json_encode(['message' => 'Hora de entrada registrada.']);
    }
}
