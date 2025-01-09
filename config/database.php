<?php
// Definir las variables de conexión a la base de datos
$host = 'localhost';
$db = 'sistema_fichaje';
$user = 'root';
$pass = '';

// Crear una nueva instancia de PDO para la conexión a la base de datos
try {    
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>