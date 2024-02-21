<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En savoir plus - RSE de David Kenos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

    <!-- Header: Remodelé pour une introduction plus dynamique -->
    <header class="body-font bg-indigo-600 text-white">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row justify-between items-center">
            <nav class="flex flex-wrap items-center text-base justify-center md:justify-start">
                <a href="#features" class="mr-5 hover:text-indigo-200" data-aos="fade-left" data-aos-delay="100"
                    data-aos-duration="1000">Fonctionnalités</a>
                <a href="#about" class="mr-5 hover:text-indigo-200" data-aos="fade-left" data-aos-delay="100"
                    data-aos-duration="1000">À Propos</a>
                <a href="#demo" class="mr-5 hover:text-indigo-200" data-aos="fade-left" data-aos-delay="100"
                    data-aos-duration="1000">Démonstration</a>
            </nav>
            <!-- <h1 class="text-xl font-bold">Projet RSE</h1>
        <img src="/portfolio_gregory/image/logo-david-kenos-blanc.png" alt="logo david kenos" class="w-24 h-auto"> -->
            <a href="accueil.php"
                class="inline-flex items-center bg-indigo-700 hover:bg-indigo-800 border-0 py-2 px-4 focus:outline-none rounded text-base transition-colors duration-300 ease-in-out"
                data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000">
                <i class="fas fa-arrow-left mr-2" data-aos="fade-left" data-aos-delay="100"
                    data-aos-duration="1000"></i> Retour à l'accueil
            </a>
        </div>
    </header>

    <!-- Section Intro: Utilisation de Tailwind pour un design épuré et moderne -->
    <section class="bg-white text-gray-800 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-1/6 md:w-1/3 w-1/2 mb-10 object-cover object-center rounded"
                src="/portfolio_gregory/image/logo-david-kenos-blanc.png" alt="logo david kenos">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">RSE David Kenos</h1>
                <p class="mb-8 leading-relaxed">
                    David Kenos, un Artisan Chocolatier français passionné, a révolutionné la communication interne au
                    sein de ses chocolateries grâce à un réseau social d’entreprise dédié. Découvrez comment cette
                    initiative favorise le partage d'expériences et renforce la cohésion d'équipe.
                </p>
                <div class="flex justify-center">
                    <a href="#about"
                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg transition-colors duration-300">En
                        savoir plus</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section À Propos du Projet: Refonte pour plus de modernité -->
    <section id="about" class="bg-gray-100 text-gray-800 body-font">
        <div class="container mx-auto py-24">
            <div class="flex flex-col items-center">
                <div class="lg:w-2/3 w-full bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                    data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                    <div class="p-8">
                        <h2 class="text-3xl font-semibold text-center">Innovation & Engagement</h2>
                        <p class="mt-4 text-lg text-center">Découvrez l'impact de notre Réseau Social d'Entreprise (RSE)
                            sur l'innovation et l'engagement des employés. Un écosystème favorisant la collaboration,
                            l'échange d'idées et la construction d'une culture d'entreprise unie et dynamique.</p>
                        <div class="mt-6 flex justify-center">
                            <a href="#details"
                                class="inline-flex items-center bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600 transition-colors ease-in-out duration-300">Découvrir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section des Fonctionnalités -->
    <section id="features" class="py-12 bg-white" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold text-gray-900">Fonctionnalités Clés du Réseau Social d'Entreprise</h2>
                <p class="mt-4 text-lg text-gray-600">Découvrez les outils et services qui transforment la communication
                    interne et renforcent la cohésion d'équipe.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Fonctionnalité 1: Inscription et Connexion -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Inscription et Connexion</h3>
                        </div>
                    </div>
                    <p>Un processus d'inscription simplifié et sécurisé, permettant aux employés de rejoindre facilement
                        le réseau.</p>
                </div>

                <!-- Fonctionnalité 2: Réseau Social pour Utilisateurs -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-comments fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Réseau Social pour Utilisateurs</h3>
                        </div>
                    </div>
                    <p>Une plateforme interactive pour partager, liker et commenter, renforçant l'esprit de communauté
                        au sein de l'entreprise.</p>
                </div>

                <!-- Fonctionnalité 3: Gestion des Profils -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-id-badge fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Gestion des Profils</h3>
                        </div>
                    </div>
                    <p>Permet aux utilisateurs de personnaliser leurs profils, favorisant une meilleure reconnaissance
                        et interaction entre collègues.</p>
                </div>

                <!-- Fonctionnalité 4: Partage de Documents -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-file-upload fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Partage de Documents</h3>
                        </div>
                    </div>
                    <p>Un système de partage de fichiers intégré, facilitant la collaboration et l'échange
                        d'informations importantes.</p>
                </div>

                <!-- Fonctionnalité 5: Calendrier d'Événements -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Calendrier d'Événements</h3>
                        </div>
                    </div>
                    <p>Un calendrier partagé pour suivre les événements de l'entreprise, permettant une meilleure
                        organisation collective.</p>
                </div>

                <!-- Fonctionnalité 6: Messagerie Instantanée -->
                <div
                    class="feature-card p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="flex-shrink-0 p-4 bg-indigo-500 text-white rounded-lg">
                            <i class="fas fa-envelope-open-text fa-2x"></i>
                        </span>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Messagerie Instantanée</h3>
                        </div>
                    </div>
                    <p>Facilite la communication en temps réel entre les employés, encourageant une collaboration rapide
                        et efficace.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section "Démonstration et Galerie" -->
    <section id="demo" class="py-12 bg-gray-50" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold text-gray-900">Démonstration et Galerie</h2>
                <p class="mt-4 text-lg text-gray-600">Plongez dans une visite guidée du RSE avec des représentations
                    visuelles et des vidéos démontrant les fonctionnalités en action.
                </p>
            </div>

            <!-- Galerie d'images -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Image 1 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/accueil.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/accueil.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>
                <!-- Image 2 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/Connexion.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/Connexion.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>
                <!-- Image 3 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/actualités.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/actualités.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>

                <!-- Image 4 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/tableau_rse.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/tableau_rse.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>

                <!-- Image 5 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/vie_des chocolateries.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/vie_des chocolateries.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>

                <!-- Image 6 -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/portfolio_gregory/image/accueil_rse.jpg" data-fancybox="gallery">
                        <img src="/portfolio_gregory/image/accueil_rse.jpg" alt="Description de l'image"
                            class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    </a>
                </div>

            </div>

            <!-- Section vidéo de démonstration (optionnelle) -->
            <!-- <div class="mt-12">
                <h3 class="text-2xl font-semibold text-center text-gray-900 mb-8">Vidéo de Démonstration</h3>
                <div class="flex justify-center">
                    <div class="w-full sm:w-2/3 lg:w-1/2 xl:w-2/5">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="URL_DE_LA_VIDÉO" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Section lien vers URL -->

    <section id="details" class="bg-gray-100 text-gray-800 body-font py-24" data-aos="zoom-out" data-aos-delay="100"
        data-aos-duration="1000">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold text-center mb-6">L'Innovation et l'Engagement par le RSE</h2>
            <p class="text-lg text-center max-w-4xl mx-auto mb-6">
                L'introduction de notre Réseau Social d'Entreprise a transformé la manière dont les employés de David
                Kenos se connectent, communiquent et collaborent. Cela a non seulement stimulé l'innovation en offrant
                une plateforme d'échange d'idées, mais a également renforcé l'engagement des employés, se sentant plus
                impliqués et écoutés au sein de l'entreprise. L'impact sur la productivité et la satisfaction au travail
                a été remarquable, prouvant l'efficacité de la mise en place d'outils adéquats de communication et de
                partage d'expériences.
            </p>
            <div class="flex justify-center mt-6">
                <a href="https://davidkenos.com" target="_blank"
                    class="inline-flex items-center bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600 transition-colors ease-in-out duration-300">
                    Visitez le site de David Kenos
                </a>
            </div>
        </div>
    </section>

    <footer class="text-gray-600 body-font bg-indigo-600">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row items-center">
            <p class="text-gray-100 text-sm text-center sm:text-left">© 2024 Projet RSE - David Kenos —
                <a href="mentions-legales.php" class="text-gray-100 ml-1" rel="noopener noreferrer"
                    target="_blank">Mentions Légales</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start items-center">
                <div class="fixed bottom-6 right-10 z-50 flex items-center">
                    <a href="#" class="text-gray-100 hover:text-gray-200 flex items-center">
                        <i class="fa-solid fa-angles-up font-bold text-xl" data-aos="zoom-in-down"></i>
                    </a>
                </div>
            </span>
        </div>
    </footer>

    <!-- Script pour l'animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>