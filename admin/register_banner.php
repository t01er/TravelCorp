<?php
include('../db/conexion.php');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['bannerTitle'];
    $description = $_POST['bannerDescription'];
    $image = $_FILES['bannerImage'];

    // Verificar si se subió una imagen
    if ($image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Asegúrate de que la ruta es correcta

        // Obtener la extensión de la imagen
        $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
        
        // Generar un nombre único para la imagen
        $imageName = uniqid() . '.' . $imageExtension;
        $uploadFile = $uploadDir . $imageName;

        // Mover la imagen al directorio de uploads
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            // Insertar solo el nombre de la imagen en la base de datos
            $sql = "INSERT INTO marketing_posts (titulo, contenido, imagen, fecha_publicacion) VALUES ('$title', '$description', '$imageName', NOW())";
            
            if ($conexion->query($sql) === TRUE) {
                echo "Nuevo banner registrado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se subió ninguna imagen.";
    }
}

// Cerrar la conexión
$conexion->close();
?>
