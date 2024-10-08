<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Travel Corp</title>
</head>

<style>
    html {
        scroll-behavior: smooth;
    }

    .headers {
        background-image: linear-gradient(#edf7ff33, #edf7ffe8), url(img/bannerone.png);
        height: 85vh;
        background-size: cover;
        width: 100%;
        background-repeat: no-repeat;
    }

    .bannerxdd {
        background-image: linear-gradient(rgba(0, 0, 0, 0.562), rgba(0, 0, 0, 0.562)), url(img/bannerone.png);
        height: 85vh;
        background-size: cover;
        background-position: center;
        width: 100%;
        background-repeat: no-repeat;
    }

    .shadow-xd {
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .active-btn {
        background-color: #0355f2;
        color: white;
        scale: 1.20;
        transition: ease-in-out .4s;
    }
</style>

<body class="bg-[#edf7ff]">
    <header id="home" class="headers ">
        <nav class="flex fixed w-full backdrop-blur-md bg-white/50  py-5 px-5 z-50">
            <div class="flex items-center justify-between max-w-7xl m-auto w-full">
                <div class="flex items-center gap-1" >
                    <img class="w-12 h-12 object-contain "  src="img/logo.png" alt="">
                    <h1 class="font-black text-2xl ">Travel Corp</h1>
                </div>
                <div class="md:hidden">
                    <button id="menu-button" class="flex items-center text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
                <div id="menu"
                    class="md:block hidden absolute md:relative md:bg-transparent md:w-fit w-full md:backdrop-none backdrop-blur-md  bg-white md:top-0 top-[70px] md:h-full h-screen left-0 rounded-lg  px-5   ">
                    <div
                        class="flex flex-col items-center h-fit justify-center md:h-full h-[80vh] md:my-0 my-20 md:flex-row gap-10 md:font-normal font-black md:text-base text-4xl ">
                        <a href="#home"
                            class="block text-gray-800 hover:text-[#0a45c3] ease-in-out duration-500 font-bold py-2">Inicio</a>
                        <a href="#aboutus"
                            class="block text-gray-800 hover:text-[#0a45c3] ease-in-out duration-500 font-bold py-2">Nosotros</a>
                        <a href="#services"
                            class="block text-gray-800 hover:text-[#0a45c3] ease-in-out duration-500 font-bold py-2">Servicios</a>
                        <a href="#welcome"
                            class="block text-gray-800 hover:text-[#0a45c3] ease-in-out duration-500 font-bold py-2">Informacion</a>
                        <a href="#contactus"
                            class="block text-gray-800 hover:text-[#0a45c3] ease-in-out duration-500 font-bold py-2">Contactanos</a>
                    </div>
                </div>
            </div>
        </nav>
        <section class="flex items-center py-10 h-screen max-w-7xl m-auto px-5 ">
            <div class="flex flex-col gap-2  ">
                <h2 class="md:text-6xl text-6xl font-black mb-5 text-balance  ">¡Bienvenido a Travel Corp!</h2>
                <p>Somos tu aliado confiable en envíos rápidos y seguros, conectando Huancayo con la selva central.
                    ¡Confía en nosotros para tus encomiendas!</p>
                <a class="py-2 px-4 shadow-xd border border-black/50 bg-[#218eff]  text-white w-fit rounded-md"
                    href="https://wa.me/+51964770687" target="_blank">Contactar</a>
            </div>
            <div class="w-full flex items-center justify-center hidden md:flex">
                <img class="w-96 h-96 object-cover rounded-full  " src="img/banner.jpg" alt="">
            </div>
        </section>
    </header>
    <main>
        <section class="bg-[#d6ecff] py-10">
            <div class="max-w-7xl m-auto">
                <div class="flex items-center justify-between px-5 ">
                    <div class="flex items-center flex-col gap-2 ">
                        <span id="experience" class="font-black text-4xl text-[#0f275c]">0</span>
                        <p class="text-zinc-700 text-normal  md:text-xs ">Años de Experiencia</p>
                    </div>
                    <div class="flex items-center flex-col gap-2 ">
                        <span id="movingHeight" class="font-black text-4xl text-[#0f275c]">0</span>
                        <p class="text-zinc-700 text-normal  md:text-xs ">Envios</p>
                    </div>
                    <div class="flex items-center flex-col gap-2 ">
                        <span id="rating" class="font-black text-4xl text-[#0f275c]">0</span>
                        <p class="text-zinc-700 text-normal  md:text-xs ">Calificación</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="swiper-container max-w-7xl mx-auto mt-10 overflow-hidden ">
            <?php
            // Conectar a la base de datos
            include('db/conexion.php');

            // Consulta para obtener los banners
            $query = "SELECT titulo, imagen FROM marketing_posts";
            $result = $conexion->query($query);
            ?>

            <div class="swiper-wrapper">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="swiper-slide text-white shadow-lg flex items-center">
                        <img class="rounded-2xl" src="admin/uploads/<?php echo $row['imagen']; ?>"
                            alt="<?php echo $row['titulo']; ?>">
                    </div>
                <?php endwhile; ?>
            </div>

            <?php
            // Cerrar la conexión
            $conexion->close();
            ?>

        </section>



        <section id="aboutus" class="flex items-center justify-between max-w-7xl m-auto py-20 px-5 border-t border-zinc-300  mt-20">
            <div class="w-full md:block hidden  ">
                <img class="w-96 h-96 object-cover rounded-2xl " src="img/5306ff2f-0ee2-4865-9330-57960dbecaa6.jpg"
                    alt="">
            </div>
            <div>
                <div class="flex flex-col gap-4 ">
                    <h2 class="text-5xl font-bold">Sobre Nosotros</h2>
                    <p>En Travel Corp, nos especializamos en ofrecer servicios de encomiendas entre Huancayo y la selva
                        central. Nuestro compromiso es garantizar entregas seguras y puntuales, brindando atención
                        personalizada a cada cliente. Con un enfoque en la calidad y la confianza, somos el aliado ideal
                        para tus necesidades de envío.</p>
                    <div>
                        <button id="btn-mision"
                            class="w-fit py-2 px-4 shadow-xd border border-black/50 bg-[#218eff]  text-white rounded-md ">Misión</button>
                        <button id="btn-vision"
                            class="w-fit py-2 px-4 shadow-xd border border-black/50 bg-[#218eff]  text-white rounded-md ">Visión</button>

                    </div>
                </div>
            </div>
            <div id="modal-mision"
                class="fixed  z-50 inset-0 hidden bg-black bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-5 rounded-lg w-[90%] max-w-lg">
                    <h2 class="text-2xl font-bold mb-4">Misión</h2>
                    <p>Proporcionamos un servicio de encomiendas eficiente, seguro y accesible que conecta Huancayo con
                        la selva central y sus alrededores. Nos comprometemos a garantizar entregas puntuales de
                        paquetes y documentos, brindando una atención excepcional adaptándonos a las necesidades de
                        nuestros clientes, facilitando el comercio y la comunicación para impulsar el crecimiento
                        económico y social.</p>
                    <button id="close-mision" class="mt-4 px-4 py-2 bg-[#218eff]  text-white rounded-md">Cerrar</button>
                </div>
            </div>

            <!-- Modal Visión -->
            <div id="modal-vision"
                class="fixed z-50  inset-0 hidden bg-black bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-5 rounded-lg w-[90%] max-w-lg">
                    <h2 class="text-2xl font-bold mb-4">Visión</h2>
                    <p>Ser la agencia de encomiendas líder en Huancayo, reconocida por nuestra calidad, confianza e
                        innovación en servicios de envío. Aspiramos a ser el aliado estratégico en el que nuestros
                        clientes confíen para sus necesidades de envío, un vínculo esencial entre Huancayo y la Selva.
                    </p>
                    <button id="close-vision" class="mt-4 px-4 py-2 bg-[#218eff]  text-white rounded-md">Cerrar</button>
                </div>
            </div>
        </section>
        <section id="services" class="max-w-7xl m-auto py-20">
            <div class="flex flex-col gap-5 pb-20 px-5">
                <h2 class="text-5xl font-bold md:text-center text-left ">Nuestros Servicios</h2>
                <p class="md:text-center text-left">Ofrecemos soluciones de encomiendas rápidas y seguras entre Huancayo
                    y la selva central. Garantizamos entregas puntuales, adaptadas a las necesidades de cada cliente,
                    con un enfoque en eficiencia, confiabilidad y satisfacción.</p>
            </div>

            <div class="max-w-7xl m-auto grid md:grid-cols-4 grid-cols-1 px-5 gap-4">
                <div class="border-[#218eff] border-2 p-7 rounded-2xl">
                    <div class="flex flex-col items-start justify-center gap-2 ">
                        <img class="w-20 h-20 object-contain" src="img/sobre.png" alt="">
                        <div class="flex flex-col gap-2">
                            <h2 class=" font-bold mb-4">HUANCAYO A TARMA</h2>
                            <p class="text-lg font-semibold">Pequeño, Documentos (Sobres):</p>
                            <p class="text-2xl mb-4 font-bold text-[#0a45c3] ">S/ 5</p>
                            <p class="text-sm">Encomiendas de acuerdo al peso, cotizar a través de nuestro WhatsApp o
                                acercarse
                                a la empresa.</p>
                        </div>
                    </div>
                </div>

                <div class="border-[#218eff] border-2 p-7 rounded-2xl">
                    <div class="flex flex-col items-start justify-center gap-2 ">
                        <img class="w-20 h-20 object-cover" src="img/paquete.png" alt="">
                        <div class="flex flex-col gap-2">
                            <h2 class=" font-bold mb-4">HUANCAYO A TARMA</h2>
                            <span class="text-xs font-bold text-[#0a45c3] py-2">Tamaño</span>
                            <div class="flex gap-2 items-center">
                                <button id="buttonM"
                                    class="text-lg font-semibold border-2 border-[#0a45c3] rounded-full shadow-md w-10 h-10 flex items-center justify-center active-btn">M</button>
                                <button id="buttonL"
                                    class="text-lg font-semibold border-2 border-[#0a45c3] rounded-full shadow-md w-10 h-10 flex items-center justify-center">L</button>
                            </div>
                            <p id="price" class="text-2xl mb-4 font-bold text-[#0a45c3] ">S/ 15</p>
                            <p class="text-sm">Encomiendas de acuerdo al peso, cotizar a través de nuestro WhatsApp o
                                acercarse
                                a la empresa.</p>
                        </div>
                    </div>
                </div>
                <div class="border-[#218eff] border-2 p-7 rounded-2xl">
                    <div class="flex flex-col items-start justify-center gap-2 ">
                        <img class="w-20 h-20 object-contain" src="img/sobre.png" alt="">
                        <div class="flex flex-col gap-2">
                            <h2 class=" font-bold mb-4">HUANCAYO A LA SELVA</h2>
                            <p class="text-lg font-semibold">Pequeño, Documentos (Sobres):</p>
                            <p class="text-2xl mb-4 font-bold text-[#0a45c3] ">S/ 10</p>
                            <p class="text-sm">Encomiendas de acuerdo al peso, cotizar a través de nuestro WhatsApp o
                                acercarse
                                a la empresa.</p>
                            <span class="flex items-center  gap-2 text-xs text-[#0a45c3]"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                San Ramón, La Merced, Pichanaki, Satipo, Pangoa</span>
                        </div>
                    </div>
                </div>


                <div class="border-[#218eff] border-2 p-7 rounded-2xl">
                    <div class="flex flex-col items-start justify-center gap-2 ">
                        <img class="w-20 h-20 object-cover" src="img/paquete.png" alt="">
                        <div class="flex flex-col gap-2">
                            <h2 class=" font-bold mb-4">HUANCAYO A LA SELVA</h2>
                            <span class="text-xs font-bold text-[#0a45c3] py-2">Tamaño</span>
                            <div class="flex gap-2 items-center">
                                <button id="buttonM2"
                                    class="text-lg font-semibold border-2 border-[#0a45c3] rounded-full shadow-md w-10 h-10 flex items-center justify-center active-btn">M</button>
                                <button id="buttonL2"
                                    class="text-lg font-semibold border-2 border-[#0a45c3] rounded-full shadow-md w-10 h-10 flex items-center justify-center">L</button>
                            </div>
                            <p id="price2" class="text-2xl mb-4 font-bold text-[#0a45c3] ">S/ 20</p>
                            <p class="text-sm">Encomiendas de acuerdo al peso, cotizar a través de nuestro WhatsApp o
                                acercarse
                                a la empresa.</p>
                            <span class="flex items-center  gap-2 text-xs text-[#0a45c3]"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                San Ramón, La Merced, Pichanaki, Satipo, Pangoa</span>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <section>

            <div id="welcome" class="max-w-7xl m-auto py-20 px-5">
                <h2 class="text-5xl font-bold">Por que Elegirnos?</h2>
                <div class="flex md:flex-row flex-col items-center gap-20 py-10 ">
                    <div class="flex flex-col gap-5">
                        <div>
                            <div class="bg-[#d6ecff] p-5 rounded-2xl">
                                <div class="flex gap-2 items-end mb-4 ">
                                    <img class="w-10 h-10 object-cover" src="img/comercio-justo.png" alt="">
                                    <h3 class="text-lg text-[#0a45c3] font-bold">Compromiso con la Eficiencia</h3>
                                </div>
                                <p>Elige nuestro servicio y experimenta la confianza de entregas puntuales y seguras.
                                    Nos
                                    enfocamos en entender tus necesidades y adaptarnos a ellas, garantizando que tus
                                    paquetes y
                                    documentos lleguen a su destino sin contratiempos.</p>
                            </div>

                        </div>
                        <div>
                            <div class="bg-[#d6ecff] p-5 rounded-2xl">
                                <div class="flex gap-2 items-end mb-4 ">
                                    <img class="w-10 h-10 object-cover" src="img/cohete.png" alt="">
                                    <h3 class="text-lg text-[#0a45c3] font-bold">Innovación y Calidad</h3>
                                </div>
                                <p>Opta por nosotros y disfruta de un servicio que evoluciona contigo. Nuestro
                                    compromiso
                                    con la
                                    calidad y la innovación nos posiciona como la agencia de encomiendas preferida en
                                    Huancayo.
                                    Conectamos la ciudad con la selva central de manera ágil y confiable.</p>
                            </div>

                        </div>
                        <div>
                            <div class="bg-[#d6ecff] p-5 rounded-2xl">
                                <div class="flex gap-2 items-end mb-4 ">
                                    <img class="w-10 h-10 object-cover" src="img/solucion.png" alt="">
                                    <h3 class="text-lg text-[#0a45c3] font-bold">Socio Estratégico</h3>
                                </div>
                                <p>Conviértete en parte de nuestra misión de impulsar el comercio y la comunicación. No
                                    solo
                                    somos un servicio de envío; somos tu aliado estratégico, brindando atención
                                    excepcional
                                    y
                                    apoyando el crecimiento económico y social de nuestra región.</p>
                            </div>

                        </div>

                    </div>
                    <div>
                        <img class="rounded-2xl " src="img/img4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="bannerxdd max-w-7xl m-auto h-[100%] rounded-xl p-10">
                <h2 class="text-white font-black text-5xl pb-3">Comencemos Juntos</h2>
                <p class="text-white">Con nosotros, cada envío es un paso hacia el éxito. Te invitamos a descubrir cómo
                    nuestro servicio de encomiendas puede facilitar tus necesidades de envío. Con un enfoque en la
                    eficiencia y la atención al cliente, estamos aquí para conectar Huancayo con la selva central y más
                    allá. ¡Inicia tu viaje con nosotros y experimenta la diferencia!</p>
                <button
                    class="w-fit py-2 px-4 shadow-xd border border-black/50 bg-[#218eff]  text-white w-fit rounded-md mt-20">Contactar</button>
            </div>
        </section>
        <section class="max-w-7xl m-auto overflow-hidden py-10">
            <h2 class="text-5xl font-bold mb-6">Comentarios de Nuestros Clientes</h2>

            <!-- Swiper Slider -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    include('db/conexion.php'); // Asegúrate de ajustar la ruta correctamente
                    
                    $query = "SELECT r.id_reseña, r.titulo, r.comentario, r.puntuacion, c.nombre AS cliente_nombre 
                  FROM reseñas r 
                  JOIN clientes c ON r.id_cliente = c.id_cliente";
                    $result = $conexion->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $titulo = $row['titulo'];
                            $comentario = $row['comentario'];
                            $puntuacion = $row['puntuacion'];
                            $cliente_nombre = $row['cliente_nombre'];
                            ?>
                            <!-- Slide para cada reseña -->
                            <div
                                class="swiper-slide flex justify-start items-center w-full bg-white shadow-md rounded-2xl p-10">
                                <div class="flex flex-col gap-2">
                                    <div class="w-10 h-10 flex items-center justify-center p-2 rounded-full">
                                        <img class="scale-90" src="img/comillas.svg" alt="">
                                    </div>
                                    <span class="block mt-2 text-zinc-900 text-lg font-black">-
                                        <?php echo $cliente_nombre; ?></span>

                                    <!-- Generar las estrellas según la puntuación -->
                                    <div class="flex items-center gap-1">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-6 <?php echo $i <= $puntuacion ? 'fill-yellow-500 text-yellow-500 ' : ''; ?>">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                            </svg>
                                        <?php } ?>
                                    </div>

                                    <p class="text-lg text-gray-700">"<?php echo $comentario; ?>"</p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>No hay reseñas disponibles.</p>';
                    }
                    ?>
                </div>
            </div>


            <!-- Botón para añadir un comentario -->
            <div class="mt-6 text-center">
                <button id="openModal"
                    class="py-2 px-6 bg-[#218eff] text-white rounded-md shadow-lg hover:bg-[#1a70d1] transition duration-300">
                    Comentar
                </button>
            </div>
        </section>
        <div id="commentModal" class="fixed inset-0 hidden z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="bg-[#218eff] px-4 py-3 text-white flex justify-between items-center">
                        <h2 class="text-lg font-bold">Registrar Comentario</h2>
                        <button id="closeModal" class="text-white font-bold text-2xl">&times;</button>
                    </div>

                    <form id="commentForm" method="POST">
                        <div class="px-6 py-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md"
                                placeholder="Tu nombre...">

                            <label for="phone" class="block text-gray-700 font-bold mb-2">Número de Celular:</label>
                            <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border rounded-md"
                                placeholder="Tu número de celular...">

                            <label for="comment" class="block text-gray-700 font-bold mb-2">Comentario:</label>
                            <textarea id="comment" name="comment" class="w-full px-4 py-2 border rounded-md"
                                placeholder="Escribe tu comentario..." rows="4"></textarea>

                            <input type="hidden" id="rating" name="rating" value="5">
                        </div>


                        <div class="flex items-center gap-1 px-6 py-4">
                            <h3>Calificar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 star" data-value="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 star" data-value="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 star" data-value="3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 star" data-value="4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 star" data-value="5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </div>
                        <input type="hidden" id="rating" value="0">

                        <div class="px-6 py-3 bg-gray-100 text-right">
                            <button id="submitComment"
                                class="py-2 px-4 bg-[#218eff] text-white rounded-md shadow-md hover:bg-[#1a70d1] transition duration-300">
                                Enviar Comentario
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <footer id="contactus" class="bg-[#d6ecff] mt-20 ">
        <div class="flex items-start md:flex-row flex-col px-5 max-w-7xl m-auto gap-20 justify-between py-20">
            <div class="w-full">
                <h2 class="text-2xl font-black text-[#0a45c3] mb-5">Travel Corp</h2>
                <p>En Travel Corp, nos especializamos en ofrecer servicios de encomiendas entre Huancayo y la selva
                    central. Nuestro compromiso es garantizar entregas seguras y puntuales, brindando atención
                    personalizada a cada cliente. Con un enfoque en la calidad y la confianza, somos el aliado ideal
                    para tus necesidades de envío.</p>
                <div class="flex items-center justify-center md:justify-start md:pt-10 gap-2 pt-20 md:pt-0">
                    <span>
                        <a href=""><img class="w-9 h-9" src="img/x.svg" alt=""></a>
                    </span>
                    <span>
                        <a href=""><img class="w-9 h-9" src="img/facebok.svg" alt=""></a>
                    </span>
                    <span>
                        <a href=""><img class="w-9 h-9" src="img/tiktok.svg" alt=""></a>
                    </span>
                    <span>
                        <a href="https://wa.me/+51964770687" target="_blank"><img class="w-9 h-9" src="img/wtsap.png"
                                alt=""></a>
                    </span>
                </div>
            </div>
            <div class="w-full">
                <h3 class="font-bold text-2xl mb-5 text-center ">Quick Links</h3>
                <div class="flex flex-col gap-2 items-center justify-center">
                    <a class="hover:text-[#0a45c3] ease-in-out duration-500 font-bold " href="">Home</a>
                    <a class="hover:text-[#0a45c3] ease-in-out duration-500 font-bold " href="">About Us</a>
                    <a class="hover:text-[#0a45c3] ease-in-out duration-500 font-bold " href="">Services</a>
                    <a class="hover:text-[#0a45c3] ease-in-out duration-500 font-bold " href="">Blog</a>
                </div>
            </div>
            <div class="w-full">
                <h2 class="font-bold text-2xl mb-5 md:text-end text-center ">Información</h2>
                <div class="flex flex-col md:items-end items-center gap-5">
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                        </svg>
                        <span>+51 964770687</span>
                    </div>
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span><a class="hover:text-[#0a45c3] ease-in-out duration-500 font-bold"
                                href="">info@gmail.com</a></span>
                    </div>
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span>Ubicación</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const buttonM = document.getElementById('buttonM');
        const buttonL = document.getElementById('buttonL');
        const buttonM2 = document.getElementById('buttonM2');
        const buttonL2 = document.getElementById('buttonL2');
        const priceElement = document.getElementById('price');
        const priceElement2 = document.getElementById('price2');

        function removeActiveClassFirstCard() {
            buttonM.classList.remove('active-btn');
            buttonL.classList.remove('active-btn');
        }

        function removeActiveClassSecondCard() {
            buttonM2.classList.remove('active-btn');
            buttonL2.classList.remove('active-btn');
        }

        buttonM.addEventListener('click', () => {
            removeActiveClassFirstCard();
            buttonM.classList.add('active-btn');
            priceElement.textContent = 'S/ 15';
        });

        buttonL.addEventListener('click', () => {
            removeActiveClassFirstCard();
            buttonL.classList.add('active-btn');
            priceElement.textContent = 'S/ 20 o 25';
        });

        buttonM2.addEventListener('click', () => {
            removeActiveClassSecondCard();
            buttonM2.classList.add('active-btn');
            priceElement2.textContent = 'S/ 20';
        });

        buttonL2.addEventListener('click', () => {
            removeActiveClassSecondCard();
            buttonL2.classList.add('active-btn');
            priceElement2.textContent = 'S/ 25 o 30';
        });
    </script>

    <script>
        function animateCount(element, target, duration) {
            let start = 0;
            const stepTime = Math.abs(Math.floor(duration / target));
            const increment = target / (duration / stepTime);

            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    clearInterval(timer);
                    start = target;
                }
                element.textContent = Math.floor(start);
            }, stepTime);
        }

        document.addEventListener('DOMContentLoaded', () => {
            animateCount(document.getElementById('experience'), 7, 2000);
            animateCount(document.getElementById('movingHeight'), 550, 2000);
            animateCount(document.getElementById('rating'), 4.8, 2000);
        });
    </script>

    <script>
        const menuButton = document.getElementById('menu-button');
        const menu = document.getElementById('menu');
        const menuLinks = menu.querySelectorAll('a');

        menuButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });
    </script>

    <script>
        document.getElementById('btn-mision').addEventListener('click', function () {
            document.getElementById('modal-mision').classList.remove('hidden');
        });

        document.getElementById('close-mision').addEventListener('click', function () {
            document.getElementById('modal-mision').classList.add('hidden');
        });

        document.getElementById('btn-vision').addEventListener('click', function () {
            document.getElementById('modal-vision').classList.remove('hidden');
        });

        document.getElementById('close-vision').addEventListener('click', function () {
            document.getElementById('modal-vision').classList.add('hidden');
        });
    </script>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        var slider = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });


    </script>

    <script>
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const commentModal = document.getElementById('commentModal');
        const submitComment = document.getElementById('submitComment');

        // Abrir modal
        openModal.addEventListener('click', () => {
            commentModal.classList.remove('hidden');
        });

        // Cerrar modal
        closeModal.addEventListener('click', () => {
            commentModal.classList.add('hidden');
        });


    </script>

    <script>
        // Obtener todas las estrellas
        const stars = document.querySelectorAll('.star');

        // Añadir evento de click a cada estrella
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const ratingValue = star.getAttribute('data-value');
                document.getElementById('rating').value = ratingValue;

                // Resetear todas las estrellas a su estado vacío
                stars.forEach(s => {
                    s.setAttribute('fill', 'none');
                    s.setAttribute('stroke', 'currentColor');
                });

                // Colorear las estrellas seleccionadas
                for (let i = 0; i < ratingValue; i++) {
                    stars[i].setAttribute('fill', '#ffc107');  // Color amarillo
                    stars[i].setAttribute('stroke', '#ffc107');
                }
            });
        });

    </script>


    <script>
        $(document).ready(function () {
            // Manejar la selección de estrellas para la puntuación
            $(".star").on("click", function () {
                var ratingValue = $(this).data("value");
                $("#rating").val(ratingValue);

                // Resaltar las estrellas seleccionadas
                $(".star").each(function () {
                    if ($(this).data("value") <= ratingValue) {
                        $(this).addClass("text-yellow-500");
                    } else {
                        $(this).removeClass("text-yellow-500");
                    }
                });
            });

            // Manejar el envío del formulario
            $("#submitComment").on("click", function (e) {
                e.preventDefault();

                // Obtener los datos del formulario
                var formData = {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    comment: $("#comment").val(),
                    rating: $("#rating").val()
                };

                $.ajax({
                    url: 'admin/reseña.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === "success") {
                            alert(response.message); // Mostrar mensaje de éxito

                            // Limpiar los campos del formulario
                            $("#name").val('');
                            $("#phone").val('');
                            $("#comment").val('');
                            $("#rating").val('');

                            // Desmarcar las estrellas resaltadas
                            $(".star").removeClass("text-yellow-500");

                            // Cerrar el modal (ejemplo, puedes ajustar según tu implementación)
                            $('#closeModal').click();
                        } else {
                            alert(response.message); // Mostrar mensaje de error
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error en la solicitud:", error);
                        alert("Hubo un problema al enviar el comentario.");
                    }
                });
            });
        });
    </script>

</body>

</html>