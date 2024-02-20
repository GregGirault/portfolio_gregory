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

    <header class="bg-white shadow-lg py-4" data-aos="fade-down">
        <nav class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="text-xl font-bold text-gray-800">Grégory Girault</a>
            <div class="space-x-4 hidden md:flex">
                <a href="#home"
                    class="text-gray-800 text-sm font-medium transition-colors duration-300 hover:text-indigo-500">Accueil</a>
                <a href="#about"
                    class="text-gray-800 text-sm font-medium transition-colors duration-300 hover:text-indigo-500">À
                    propos</a>
                <a href="#skills"
                    class="text-gray-800 text-sm font-medium transition-colors duration-300 hover:text-indigo-500">Compétences</a>
                <a href="#contact"
                    class="text-gray-800 text-sm font-medium transition-colors duration-300 hover:text-indigo-500">Contact</a>
            </div>
            <button id="menu-toggle" class="md:hidden text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </nav>
    </header>

    <section id="home" class="flex justify-center items-center h-screen bg-gray-100" data-aos="fade-up">
        <div class="text-center">
            <img src="/portfolio_gregory/image/Greg DALL-E.webp" alt="Grégory Girault"
                class="mx-auto rounded-full w-32 h-32 object-cover transition-transform duration-500 ease-in-out hover:scale-110">
            <h1 class="text-5xl font-bold text-gray-800 mt-4">Grégory Girault</h1>
            <p class="mt-4 text-lg text-gray-600">Développeur Web Fullstack | Passionné par Symfony</p>
            <div class="mt-8 space-x-4">
                <a href="#projects"
                    class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600 transition duration-300 ease-in-out">Voir
                    mes projets</a>
                <a href="#contact"
                    class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-300 ease-in-out">Contactez-moi</a>
            </div>
        </div>
    </section>

    <section id="about" class="bg-gray-100 py-12" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-semibold text-gray-900">À propos de moi</h2>
                <div class="mt-4 text-lg leading-relaxed text-gray-600 mx-auto lg:w-2/3">
                    Passionné par l'informatique, les nouvelles technologies et naviguant sur le web, j'ai exploré
                    diverses carrières avant de découvrir ma passion pour le développement web. Mon parcours varié, de
                    la cuisine à l'électricité, en passant par l'armée et l'horticulture, jusqu'à mon rôle chez
                    Textilot, m'a finalement conduit à embrasser ma véritable vocation en tant que développeur web.
                    Aujourd'hui, je suis spécialisé en <strong>Symfony</strong> et <strong>Tailwind</strong>, avec une
                    aspiration à ouvrir ma propre entreprise de développement web.
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto" data-aos="zoom-in">
            <div class="text-center mb-20">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">Projets</h1>
                <p class="text-lg mt-4 leading-relaxed xl:w-2/3 mx-auto text-gray-600">Découvrez une sélection de mes
                    projets, illustrant ma capacité à concevoir et développer des solutions web innovantes.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <!-- Projet 1 : RSE -->
                <div class="p-4 md:w-1/2" data-aos="fade-right" data-aos-delay="100">
                    <div
                        class="h-full bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-500 ease-in-out">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                            src="/portfolio_gregory/image/project_rse.jpg" alt="Réseau Social d'Entreprise"
                            loading="lazy">
                        <div class="p-6">
                            <h2 class="title-font text-xl font-semibold text-gray-900 mb-3">Réseau Social d'Entreprise
                                (RSE)</h2>
                            <p class="leading-relaxed mb-3 text-gray-600">Favorisant la communication interne et le
                                partage entre collaborateurs, ce projet utilise Symfony et LESS pour une expérience
                                utilisateur optimisée.</p>
                            <a href="page_detail_rse.html" class="text-indigo-500 inline-flex items-center group">
                                En savoir plus
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

                <!-- Projet 2 : ToDoList -->
                <div class="p-4 md:w-1/2" data-aos="fade-left" data-aos-delay="200">
                    <div
                        class="h-full bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-500 ease-in-out">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                            src="/portfolio_gregory/image/project_todolist.jpg" alt="ToDoList en Symfony"
                            loading="lazy">
                        <div class="p-6">
                            <h2 class="title-font text-xl font-semibold text-gray-900 mb-3">ToDoList en Symfony</h2>
                            <p class="leading-relaxed mb-3 text-gray-600">Conçue pour améliorer la productivité
                                quotidienne, cette ToDoList utilise Symfony et Bootstrap pour une interface élégante et
                                fonctionnelle.</p>
                            <a href="page_detail_todolist.html" class="text-indigo-500 inline-flex items-center group">
                                En savoir plus
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

            </div>
        </div>
    </section>



    <!-- Compétences -->
    <section id="skills" class="bg-white py-20" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-semibold text-gray-900">Compétences</h1>
                <p class="text-lg leading-relaxed xl:w-2/3 mx-auto text-gray-600">Voici les technologies et les outils
                    que j'utilise pour créer des solutions web efficaces et modernes.</p>
            </div>
            <div class="flex flex-wrap justify-center items-center">
                <!-- PHP -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-gray-100 rounded-lg p-6 flex flex-col items-center">
                        <img class="mb-4 w-20 h-20" src="/portfolio_gregory/image/php.svg" alt="PHP">
                        <h2 class="title-font font-medium text-lg text-gray-900">PHP</h2>
                        <p class="text-base text-gray-600">Serveur & Backend</p>
                    </div>
                </div>
                <!-- Symfony -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="150">
                    <div class="bg-gray-100 rounded-lg p-6 flex flex-col items-center">
                        <img class="mb-4 w-20 h-20" src="/portfolio_gregory/image/symfony.svg" alt="Symfony">
                        <h2 class="title-font font-medium text-lg text-gray-900">Symfony</h2>
                        <p class="text-base text-gray-600">Framework PHP</p>
                    </div>
                </div>
                <!-- CSS -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-gray-100 rounded-lg p-6 flex flex-col items-center">
                        <img class="mb-4 w-20 h-20" src="/portfolio_gregory/image/css.svg" alt="CSS">
                        <h2 class="title-font font-medium text-lg text-gray-900">CSS</h2>
                        <p class="text-base text-gray-600">Styling & Layouts</p>
                    </div>
                </div>
                <!-- Tailwind CSS -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="250">
                    <div class="bg-gray-100 rounded-lg p-6 flex flex-col items-center">
                        <img class="mb-4 w-20 h-20" src="/portfolio_gregory/image/tailwind-css-2.svg"
                            alt="Tailwind CSS">
                        <h2 class="title-font font-medium text-lg text-gray-900">Tailwind CSS</h2>
                        <p class="text-base text-gray-600">Design Utility-first</p>
                    </div>
                </div>
                <!-- JavaScript -->
                <div class="p-4 md:w-1/4 lg:w-1/5" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-gray-100 rounded-lg p-6 flex flex-col items-center">
                        <img class="mb-4 w-20 h-20" src="/portfolio_gregory/image/logo-javascript.svg" alt="JavaScript">
                        <h2 class="title-font font-medium text-lg text-gray-900">JavaScript</h2>
                        <p class="text-base text-gray-600">Interaction & Frontend</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="text-gray-700 body-font relative" data-aos="fade-up">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold title-font text-gray-900">Contactez-moi</h2>
                <p class="text-lg leading-relaxed mx-auto lg:w-2/3">Vous avez un projet en tête ou souhaitez discuter
                    d'une opportunité ? N'hésitez pas à me contacter.</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form id="contact-form" action="traitement_contact.php" method="POST" class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-white rounded border border-gray-300 focus:ring-2 focus:ring-indigo-500 text-base px-4 py-2"
                            placeholder="Nom" type="text" name="name" required>
                    </div>
                    <div class="p-2 w-1/2">
                        <input
                            class="w-full bg-white rounded border border-gray-300 focus:ring-2 focus:ring-indigo-500 text-base px-4 py-2"
                            placeholder="Email" type="email" name="email" required>
                    </div>
                    <div class="p-2 w-full">
                        <textarea
                            class="w-full bg-white rounded border border-gray-300 focus:ring-2 focus:ring-indigo-500 text-base px-4 py-2 resize-none"
                            placeholder="Message" name="message" required></textarea>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 border-0 py-2 px-8 rounded text-lg transition duration-300 ease-in-out"
                            type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center mt-6">
                <a href="https://github.com/GregGirault" target="_blank"
                    class="text-gray-500 hover:text-gray-700 transition duration-300 ease-in-out text-4xl mx-4">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/grégory-girault-420270263" target="_blank"
                    class="text-gray-500 hover:text-blue-500 transition duration-300 ease-in-out text-4xl mx-4">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </section>



    <footer class="bg-white text-center p-4 text-gray-600">
        © 2024 Grégory Girault - Tous droits réservés.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="accueil.js"></script>
</body>

</html>