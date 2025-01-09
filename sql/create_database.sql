-- Crear base de datos y tablas empleados y registros_asistencia para el sistema de fichaje
CREATE DATABASE sistema_fichaje;

USE sistema_fichaje;

CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL,
    puesto VARCHAR(50) NOT NULL
);

CREATE TABLE registros_asistencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    empleado_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora_entrada TIME NOT NULL,
    hora_salida TIME,
    total_horas TIME /* DECIMAL(5,2) */,
    FOREIGN KEY (empleado_id) REFERENCES empleados(id)
);

