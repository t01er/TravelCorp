<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "travelcorp"; 

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

