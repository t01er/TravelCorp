<?php
include('../db/conexion.php');

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT id_usuario, nombre, email, contrasena, rol FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verificar si la contraseña coincide
    if (password_verify($password, $user['contrasena'])) {
        session_start();
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Contraseña incorrecta"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
}
