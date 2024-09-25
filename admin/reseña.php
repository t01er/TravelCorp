<?php
include('../db/conexion.php');

$nombre = $_POST['name'];
$celular = $_POST['phone'];
$comentario = $_POST['comment'];
$puntuacion = $_POST['rating'];
$fecha_actual = date('Y-m-d');

$nombre = mysqli_real_escape_string($conexion, $nombre);
$celular = mysqli_real_escape_string($conexion, $celular);
$comentario = mysqli_real_escape_string($conexion, $comentario);
$puntuacion = (int)$puntuacion; 

$query_cliente = "SELECT id_cliente FROM clientes WHERE telefono = '$celular'";
$result_cliente = mysqli_query($conexion, $query_cliente);

if (mysqli_num_rows($result_cliente) > 0) {
    $cliente = mysqli_fetch_assoc($result_cliente);
    $id_cliente = $cliente['id_cliente'];

    $query_comentario = "SELECT * FROM reseñas WHERE id_cliente = $id_cliente AND DATE(fecha) = '$fecha_actual'";
    $result_comentario = mysqli_query($conexion, $query_comentario);

    if (mysqli_num_rows($result_comentario) > 0) {
        echo json_encode(["status" => "error", "message" => "Solo puedes enviar un comentario por día."]);
    } else {
        // Insertar el comentario
        $titulo = "Reseña de " . $nombre;
        $insert_comentario = "INSERT INTO reseñas (id_cliente, titulo, comentario, puntuacion, fecha) 
                              VALUES ($id_cliente, '$titulo', '$comentario', $puntuacion, NOW())";
        if (mysqli_query($conexion, $insert_comentario)) {
            echo json_encode(["status" => "success", "message" => "Comentario enviado con éxito."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Hubo un problema al enviar el comentario."]);
        }
    }
} else {
    // Si el cliente no está registrado, lo registramos
    $insert_cliente = "INSERT INTO clientes (nombre, telefono, fecha_registro) 
                       VALUES ('$nombre', '$celular', NOW())";
    
    if (mysqli_query($conexion, $insert_cliente)) {
        $id_cliente = mysqli_insert_id($conexion);

        $titulo = "Reseña de " . $nombre;
        $insert_comentario = "INSERT INTO reseñas (id_cliente, titulo, comentario, puntuacion, fecha) 
                              VALUES ($id_cliente, '$titulo', '$comentario', $puntuacion, NOW())";
        
        if (mysqli_query($conexion, $insert_comentario)) {
            echo json_encode(["status" => "success", "message" => "Cliente registrado y comentario enviado con éxito."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Hubo un problema al enviar el comentario."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Hubo un problema al registrar el cliente."]);
    }
}


