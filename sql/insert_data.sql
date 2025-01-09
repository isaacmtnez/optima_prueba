-- Insertar datos de prueba en las tablas empleados y registros_asistencia de la base de datos sistema_fichaje
USE sistema_fichaje;

INSERT INTO empleados (nombre, correo_electronico, puesto) VALUES
('Ian', 'ian@example.com', 'Mantenimiento'),
('Luis', 'luis@example.com', 'Cristalero'),
('María', 'maria@example.com', 'Limpiador'),
('Carmen', 'carmen@example.com', 'Conserje'),
('Sara', 'sara@example.com', 'Administración'),
('Víctor', 'victor@example.com', 'Limpiador');

INSERT INTO registros_asistencia (empleado_id, fecha, hora_entrada, hora_salida, total_horas) VALUES
(1, '2024-12-10', '08:00:00', '17:00:00', '09:00:00'),
(2, '2024-12-10', '09:00:00', '17:00:00', '08:00:00'),
(3, '2024-12-10', '07:00:00', '17:00:00', '10:00:00'),
(4, '2024-12-10', '08:00:00', '17:00:00', '09:00:00'),
(5, '2024-12-10', '09:00:00', '17:00:00', '08:00:00'),
(6, '2024-12-10', '07:00:00', '17:00:00', '10:00:00'),
(1, '2024-12-11', '08:00:00', '17:00:00', '09:00:00'),
(2, '2024-12-11', '09:00:00', '17:00:00', '08:00:00'),
(3, '2024-12-11', '07:00:00', '17:00:00', '10:00:00'),
(4, '2024-12-11', '08:00:00', '17:00:00', '09:00:00'),
(5, '2024-12-11', '09:00:00', '17:00:00', '08:00:00'),
(6, '2024-12-11', '07:00:00', '17:00:00', '10:00:00');
