<?php
include('../db/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer el cuerpo de la solicitud JSON
    $data = json_decode(file_get_contents('php://input'), true);
    $id_post = $data['id_post']; // Obtener el ID del banner

    // Obtener el nombre del archivo desde la base de datos
    $sql_select = "SELECT imagen FROM marketing_posts WHERE id_post = ?";
    $stmt_select = $conexion->prepare($sql_select);
    $stmt_select->bind_param('i', $id_post);
    $stmt_select->execute();
    $stmt_select->bind_result($filename);
    $stmt_select->fetch();
    $stmt_select->close();

    // Preparar la consulta SQL para eliminar el banner
    $sql_delete = "DELETE FROM marketing_posts WHERE id_post = ?";
    $stmt_delete = $conexion->prepare($sql_delete);
    $stmt_delete->bind_param('i', $id_post);

    // Ejecutar la consulta para eliminar el post
    if ($stmt_delete->execute()) {
        // Intentar eliminar el archivo del sistema de archivos
        $file_path = '../uploads/' . $filename; // Ruta completa del archivo
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                // Archivo eliminado exitosamente
                echo json_encode(['status' => 'success', 'message' => 'El banner y el archivo han sido eliminados.']);
            } else {
                // Error al eliminar el archivo
                echo json_encode(['status' => 'success', 'message' => 'El banner ha sido eliminado, pero hubo un error al eliminar el archivo.']);
            }
        } else {
            // Archivo no encontrado
            echo json_encode(['status' => 'success', 'message' => 'El banner ha sido eliminado, pero el archivo no fue encontrado.']);
        }
    } else {
        echo json_encode(['status' => 'error']);
    }

    $stmt_delete->close();
    $conexion->close();
}
?>
