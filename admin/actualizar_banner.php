<?php
// Conectar a la base de datos
include('../db/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['editId'];
    $title = $_POST['editTitle'];
    $description = $_POST['editDescription'];
    $image = $_FILES['editImage'];

    // Comenzar una transacción
    mysqli_begin_transaction($conexion);

    try {
        // Actualizar solo el título y la descripción
        $query = "UPDATE marketing_posts SET titulo = ?, contenido = ? WHERE id_post = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ssi", $title, $description, $id);
        $stmt->execute();

        // Si se ha subido una nueva imagen
        if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
            // Obtener la información de la imagen
            $target_dir = "uploads/"; // Asegúrate de que la ruta sea correcta
            $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

            // Generar un nuevo nombre de archivo
            $newFileName = pathinfo($image["name"], PATHINFO_FILENAME) . '_' . time() . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;

            // Mover la imagen a la carpeta de uploads
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Obtener la imagen anterior para eliminarla
                $query = "SELECT imagen FROM marketing_posts WHERE id_post = ?";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                // Eliminar la imagen anterior solo si existe
                if ($row && file_exists($target_dir . $row['imagen'])) { // Usa la ruta almacenada con 'uploads/'
                    unlink($target_dir . $row['imagen']);
                }

                // Actualizar el nombre de la imagen en la base de datos (solo el nombre del archivo)
                $query = "UPDATE marketing_posts SET imagen = ? WHERE id_post = ?";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("si", $newFileName, $id); // Guarda solo el nombre del archivo
                $stmt->execute();
            } else {
                throw new Exception("Error al mover la imagen.");
            }
        }

        // Confirmar la transacción
        mysqli_commit($conexion);
        echo "Banner actualizado correctamente.";
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        mysqli_rollback($conexion);
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        if (isset($stmt)) {
            $stmt->close();
        }
        $conexion->close();
    }
} else {
    echo "Método no permitido.";
}
