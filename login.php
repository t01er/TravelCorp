<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar Sesión</h2>

        <form id="loginForm" class="space-y-6">
            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="text" id="email" name="email"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingrese su Email" required>
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingrese su contraseña" required>
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600" name="remember">
                    <span class="ml-2 text-gray-700">Recordar</span>
                </label>
                <a href="#" class="text-blue-600 hover:underline">¿Olvidó su contraseña?</a>
            </div>

            <button id="submitBtn" type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Entrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#loginForm").on("submit", function (e) {
                e.preventDefault();

                var email = $("#email").val();
                var password = $("#password").val();

                $.ajax({
                    url: 'admin/login.php',
                    type: 'POST',
                    data: { email: email, password: password },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === "success") {
                            window.location.href = "admin/index.php"; 
                        } else {
                            $("#errorMessage").text(response.message);
                        }
                    },
                    error: function () {
                        $("#errorMessage").text("Hubo un error al procesar la solicitud. Intenta nuevamente.");
                    }
                });
            });
        });
    </script>
</body>

</html>