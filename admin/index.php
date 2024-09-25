<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="max-w-7xl mx-auto mt-10 px-5">
        <h1 class="text-2xl font-bold">Bienvenido </h1>

        <button id="openModal" class="mt-5 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Registrar Banner
        </button>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg p-6 w-96">
                <h2 class="text-xl font-bold mb-4">Registrar Banner</h2>
                <form id="bannerForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="bannerTitle" class="block text-sm font-medium text-gray-700">Título del
                            Banner</label>
                        <input type="text" id="bannerTitle" name="bannerTitle"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="bannerDescription"
                            class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea id="bannerDescription" rows="4" name="bannerDescription"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="bannerImage" class="block text-sm font-medium text-gray-700">Imagen del
                            Banner</label>
                        <input type="file" id="bannerImage" accept="image/*" name="bannerImage"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Registrar</button>
                </form>
                <button id="closeModal" class="mt-4 w-full text-center text-blue-500">Cerrar</button>
            </div>
        </div>
    </div>
    <?php
    include('../db/conexion.php');

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtener los banners de la base de datos
    $sql = "SELECT id_post, titulo, contenido, imagen, fecha_publicacion FROM marketing_posts";
    $result = $conexion->query($sql);
    ?>
    <div class="max-w-7xl mx-auto mt-10 p-5">
        <h2 class="text-3xl font-bold mb-5">Lista de Banners</h2>
        <div class="overflow-x-auto"> <!-- Agregado para manejar el overflow -->
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Título</th>
                        <th class="py-2 px-4 border-b">Descripción</th>
                        <th class="py-2 px-4 border-b">Imagen</th>
                        <th class="py-2 px-4 border-b">Fecha de Publicación</th>
                        <th class="py-2 px-4 border-b">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="py-2 text-center px-4 border-b"><?php echo $row['id_post']; ?></td>
                                <td class="py-2 text-center px-4 border-b"><?php echo $row['titulo']; ?></td>
                                <td class="py-2 text-center px-4 border-b"><?php echo $row['contenido']; ?></td>
                                <td class="py-2 px-4 flex items-center justify-center border-b">
                                    <img src="uploads/<?php echo $row['imagen']; ?>" alt="<?php echo $row['titulo']; ?>"
                                        class="w-24 rounded-lg h-24 object-cover">
                                </td>
                                <td class="py-2 text-center px-4 border-b"><?php echo $row['fecha_publicacion']; ?></td>
                                <td class="py-2 text-center px-4 border-b flex gap-2 items-center justify-center">
                                    <div class="p-2 border rounded-md cursor-pointer"
                                        onclick="openEditModal(<?php echo $row['id_post']; ?>, '<?php echo $row['titulo']; ?>', '<?php echo $row['contenido']; ?>', '<?php echo $row['imagen']; ?>')">
                                        <!-- Icono de editar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </div>
                                    <div class="p-2 border rounded-md cursor-pointer"
                                        onclick="confirmDelete(<?php echo $row['id_post']; ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-2 px-4 border-b text-center">No hay banners disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg mx-5">
            <h2 class="text-xl font-bold mb-4">Editar Banner</h2>
            <form id="editForm">
                <input type="hidden" id="editId" name="editId">
                <div class="mb-4">
                    <label for="editTitle" class="block text-sm font-medium">Título:</label>
                    <input type="text" id="editTitle" name="editTitle" required
                        class="mt-1 block w-full border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-sm font-medium">Descripción:</label>
                    <textarea id="editDescription" name="editDescription" required
                        class="mt-1 block w-full border border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editImage" class="block text-sm font-medium">Imagen (opcional):</label>
                    <input type="file" id="editImage" name="editImage"
                        class="mt-1 block w-full border border-gray-300 rounded-md">
                    <span class="text-red-700 text-xs">Subir imagenes con medida de 1280 x 474 diferentes nombres por
                        favor</span>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar</button>
                <button type="button" id="closeEditModal"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </form>
        </div>
    </div>


    <?php
    $conexion->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Abrir modal
            $('#openModal').click(function () {
                $('#modal').removeClass('hidden');
            });

            // Cerrar modal
            $('#closeModal').click(function () {
                $('#modal').addClass('hidden');
            });

            // Registrar banner
            $('#bannerForm').submit(function (event) {
                event.preventDefault(); // Evita el envío del formulario

                // Crear un objeto FormData
                var formData = new FormData(this);

                // Enviar el formulario usando AJAX
                $.ajax({
                    url: 'register_banner.php', // Cambia esto por la URL de tu archivo PHP
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Maneja la respuesta del servidor
                        location.reload();
                        $('#modal').addClass('hidden'); // Cerrar el modal
                        $('#bannerForm')[0].reset(); // Restablecer el formulario
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error al registrar el banner: ' + textStatus);
                    }
                });
            });
        });
    </script>

    <script>
        // Función para abrir el modal de edición
        function openEditModal(id, title, description, image) {
            document.getElementById('editId').value = id;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editImage').value = '';

            const editModal = document.getElementById('editModal');
            editModal.classList.remove('hidden');
        }

        document.getElementById('closeEditModal').addEventListener('click', () => {
            document.getElementById('editModal').classList.add('hidden');
        });

        document.getElementById('editForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const id = document.getElementById('editId').value;
            const title = document.getElementById('editTitle').value;
            const description = document.getElementById('editDescription').value;
            const image = document.getElementById('editImage').files[0];

            const formData = new FormData();
            formData.append('editId', id);
            formData.append('editTitle', title);
            formData.append('editDescription', description);
            if (image) {
                formData.append('editImage', image);
            }

            fetch('actualizar_banner.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    location.reload();
                })

        });
    </script>

    <script>
        function confirmDelete(id) {
            const confirmation = confirm("¿Estás seguro de que deseas eliminar este banner? Esta acción no se puede deshacer.");
            if (confirmation) {
                deleteBanner(id);
            }
        }

        function deleteBanner(id) {
            fetch('delete_banner.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id_post: id })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('El banner ha sido eliminado.');
                        location.reload();
                    } else {
                        alert('No se pudo eliminar el banner.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('No se pudo eliminar el banner.');
                });
        }

    </script>
    <div class="absolute top-0 right-0 m-4 bg-zinc-950  text-white py-3 px-5 rounded-full">
        <form method="POST">
            <button class="flex items-center  gap-2" type="submit" name="logout">

                Cerrar Sesión
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
            </button>
        </form>
    </div>

</body>

</html>