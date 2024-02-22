<?php
require 'connect.php'; // Assurez-vous que le chemin d'accès est correct

// Requête pour récupérer les projets non archivés
$sql = "SELECT * FROM projets WHERE archiver = 0 ORDER BY date_creation DESC";
$stmt = $db->prepare($sql); // Utilisez $db au lieu de $pdo
$stmt->execute();
$projets = $stmt->fetchAll();
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Portfolio de Grégory Girault, développeur web fullstack spécialisé en Symfony, Tailwind, et Bootstrap.">
    <meta name="keywords" content="Grégory Girault, Développeur Web, Symfony, Tailwind, Bootstrap, Portfolio">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Portfolio de Grégory Girault</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <header class="bg-white shadow-xl py-4 sm:py-6">
        <nav class="container mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <a href="#"
                class="text-2xl font-semibold text-gray-900 hover:text-indigo-600 transition-colors duration-300">Grégory
                Girault</a>
            <div class="hidden md:flex space-x-5">
                <a href="#home"
                    class="text-gray-900 text-base font-medium transition-colors duration-300 hover:text-indigo-600">Accueil</a>
                <a href="#about"
                    class="text-gray-900 text-base font-medium transition-colors duration-300 hover:text-indigo-600">À
                    propos</a>
                <a href="#skills"
                    class="text-gray-900 text-base font-medium transition-colors duration-300 hover:text-indigo-600">Compétences</a>
                <a href="#contact"
                    class="text-gray-900 text-base font-medium transition-colors duration-300 hover:text-indigo-600">Contact</a>
            </div>
            <button id="menu-toggle" class="md:hidden text-gray-800 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </nav>
        <div id="mobile-menu" class="md:hidden hidden">
            <a href="#home" class="block py-2 px-4 text-gray-900 hover:bg-gray-100">Accueil</a>
            <a href="#about" class="block py-2 px-4 text-gray-900 hover:bg-gray-100">À propos</a>
            <a href="#skills" class="block py-2 px-4 text-gray-900 hover:bg-gray-100">Compétences</a>
            <a href="#contact" class="block py-2 px-4 text-gray-900 hover:bg-gray-100">Contact</a>
        </div>
    </header>

    <section id="home" class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="text-center p-4">
            <img src="/portfolio_gregory/image/Greg DALL-E.webp" alt="Grégory Girault"
                class="mx-auto rounded-full w-32 h-32 sm:w-48 sm:h-48 lg:w-64 lg:h-64 object-cover shadow-xl transition-transform duration-500 ease-in-out hover:scale-110">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mt-4">Grégory Girault</h1>
            <p class="mt-2 sm:mt-4 text-lg sm:text-xl lg:text-2xl text-gray-700">Développeur Web Fullstack | Passionné
                par Symfony</p>
            <div class="mt-4 sm:mt-6 space-x-2 flex flex-col sm:flex-row justify-center">
                <a href="#projects"
                    class="inline-block bg-indigo-600 text-white py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out">Voir
                    mes projets</a>
                <a href="#contact"
                    class="inline-block bg-green-600 text-white py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out mt-4 sm:mt-0">Contactez-moi</a>
            </div>

        </div>
    </section>


    <section id="about" class="bg-white py-16" data-aos="fade-up">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-800">À propos de moi</h2>
                <p class="mt-6 text-xl text-gray-700 mx-auto leading-relaxed max-w-4xl">
                    Passionné par l'informatique, les nouvelles technologies et naviguant sur le web, j'ai exploré
                    diverses carrières avant de découvrir ma passion pour le développement web. Mon parcours varié, de
                    la cuisine à l'électricité, en passant par l'armée et l'horticulture, jusqu'à mon rôle chez
                    Textilot, m'a finalement conduit à embrasser ma véritable vocation en tant que développeur web.
                    Aujourd'hui, je suis spécialisé en <span class="text-indigo-600 font-semibold">Symfony</span> et
                    <span class="text-green-600 font-semibold">Tailwind</span>, avec une aspiration à ouvrir ma propre
                    entreprise de développement web.
                </p>
            </div>
        </div>
    </section>

    <section id="projects" class="text-gray-700 body-font bg-gray-50">
    <div class="container px-5 py-24 mx-auto" data-aos="zoom-in">
        <div class="text-center mb-20">
            <h1 class="sm:text-5xl text-4xl font-extrabold text-gray-900">Projets</h1>
            <p class="text-lg mt-4 leading-relaxed xl:w-2/3 mx-auto text-gray-600">
                Découvrez une sélection de mes projets, illustrant ma capacité à concevoir et développer des solutions web innovantes.
            </p>
        </div>
        <div class="flex flex-wrap -m-4">
            <?php foreach ($projets as $projet): ?>
                    <div class="p-4 md:w-1/2" data-aos="fade-up" data-aos-delay="100">
                        <div
                            class="h-full bg-white rounded-lg overflow-hidden border border-gray-200 shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                                src="/portfolio_gregory/image/<?= htmlspecialchars($projet['image']) ?>"
                                alt="<?= htmlspecialchars($projet['titre']) ?>">
                            <div class="p-6">
                                <h2 class="title-font text-2xl font-semibold text-gray-900 mb-3">
                                    <?= htmlspecialchars($projet['titre']) ?>
                                </h2>
                                <p class="leading-relaxed mb-3 text-gray-600">
                                    <?= htmlspecialchars($projet['description']) ?>
                                </p>
                                <a href="en_savoir_plus_rse.php?id=<?= $projet['ID'] ?>"
                                    class="text-indigo-500 inline-flex items-center group">En savoir plus
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform duration-200"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section id="skills" class="bg-white py-24" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class=" lg:text-5xl text-xl md:text-2xl font-bold text-gray-900">Compétences</h1>
                <p class="text-xl mt-4 leading-relaxed xl:w-3/4 mx-auto text-gray-700">Voici les technologies et les
                    outils que j'utilise pour créer des solutions web efficaces et modernes.</p>
            </div>
            <div class="flex flex-wrap justify-center items-center">
                <!-- PHP -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="bg-gray-50 rounded-lg p-8 flex flex-col items-center shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                        <img class="mb-6 w-24 h-24" src="/portfolio_gregory/image/php.svg" alt="PHP">
                        <h2 class="title-font font-semibold text-xl text-gray-900">PHP</h2>
                        <p class="text-lg text-gray-700">Serveur & Backend</p>
                    </div>
                </div>
                <!-- Symfony -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="150">
                    <div
                        class="bg-gray-50 rounded-lg p-8 flex flex-col items-center shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                        <img class="mb-6 w-24 h-24" src="/portfolio_gregory/image/symfony.svg" alt="Symfony">
                        <h2 class="title-font font-semibold text-xl text-gray-900">Symfony</h2>
                        <p class="text-lg text-gray-700">Framework PHP</p>
                    </div>
                </div>
                <!-- CSS -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="bg-gray-50 rounded-lg p-8 flex flex-col items-center shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                        <img class="mb-6 w-24 h-24" src="/portfolio_gregory/image/css.svg" alt="CSS">
                        <h2 class="title-font font-semibold text-xl text-gray-900">CSS</h2>
                        <p class="text-lg text-gray-700">Styling & Layouts</p>
                    </div>
                </div>
                <!-- Tailwind CSS -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="250">
                    <div
                        class="bg-gray-50 rounded-lg p-8 flex flex-col items-center shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                        <img class="mb-6 w-24 h-24" src="/portfolio_gregory/image/tailwind-css-2.svg"
                            alt="Tailwind CSS">
                        <h2 class="title-font font-semibold text-xl text-gray-900">Tailwind CSS</h2>
                        <p class="text-lg text-gray-700">Design Utility-first</p>
                    </div>
                </div>
                <!-- JavaScript -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="bg-gray-50 rounded-lg p-8 flex flex-col items-center shadow-lg hover:shadow-2xl transition-shadow duration-500 ease-in-out">
                        <img class="mb-6 w-24 h-24" src="/portfolio_gregory/image/logo-javascript.svg" alt="JavaScript">
                        <h2 class="title-font font-semibold text-xl text-gray-900">JavaScript</h2>
                        <p class="text-lg text-gray-700">Interaction & Frontend</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="text-gray-700 body-font relative bg-gray-50" data-aos="fade-up">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold title-font text-gray-900">Contactez-moi</h2>
                <p class="text-xl leading-relaxed mx-auto lg:w-2/3">Vous avez un projet en tête ou souhaitez discuter
                    d'une opportunité ? N'hésitez pas à me contacter.</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form id="contact-form" action="traitement_contact.php" method="POST" class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-white rounded border border-gray-400 focus:ring-2 focus:ring-indigo-600 text-base px-4 py-2"
                            placeholder="Nom" type="text" name="name" required>
                    </div>
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-white rounded border border-gray-400 focus:ring-2 focus:ring-indigo-600 text-base px-4 py-2"
                            placeholder="Email" type="email" name="email" required>
                    </div>
                    <div class="p-2 w-full">
                        <textarea
                            class="w-full bg-white rounded border border-gray-400 focus:ring-2 focus:ring-indigo-600 text-base px-4 py-2 resize-none"
                            placeholder="Message" name="message" required></textarea>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50 border-0 py-2 px-8 rounded text-lg transition duration-300 ease-in-out"
                            type="submit">Envoyer</button>
                    </div>
                </form>
            </div>


            <!-- <div class="flex justify-center mt-6">
            <a href="https://github.com/GregGirault" target="_blank" class="text-gray-500 hover:text-gray-700 transition duration-300 ease-in-out text-4xl mx-4">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/grégory-girault-420270263" target="_blank" class="text-gray-500 hover:text-blue-600 transition duration-300 ease-in-out text-4xl mx-4">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div> -->
        </div>
    </section>

    <footer class="bg-gray-50 text-center p-6 text-gray-700">
        <div class="container mx-auto">
            <div class="mb-3">
                © 2024 Grégory Girault - Tous droits réservés.
            </div>
            <div class="flex justify-center mt-4">
                <a href="https://github.com/GregGirault" target="_blank"
                    class="mx-2 text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
                    <i class="fab fa-github text-4xl"></i>
                </a>
                <a href="https://www.linkedin.com/in/grégory-girault-420270263" target="_blank"
                    class="mx-2 text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out">
                    <i class="fab fa-linkedin text-4xl"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="accueil.js"></script>
</body>

</html>