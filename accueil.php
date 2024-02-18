<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Portfolio de Grégory Girault, développeur web fullstack spécialisé en Symfony, Tailwind, et Bootstrap.">
        <meta name="keywords" content="Grégory Girault, Développeur Web, Symfony, Tailwind, Bootstrap, Portfolio">
        <title>Portfolio de Grégory Girault</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <header class="bg-white shadow">
            <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-3xl font-bold text-gray-800">GG</a>
                <button id="menu-toggle" class="text-gray-800 text-sm font-semibold focus:outline-none md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path strokelinecap="round" strokelinejoin="round" strokewidth="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="hidden md:flex items-center" id="mobile-menu">
                    <a href="#about" class="text-gray-800 text-sm font-semibold mx-2 hover:underline">À propos</a>
                    <a href="#projects" class="text-gray-800 text-sm font-semibold mx-2 hover:underline">Projets</a>
                    <a href="#skills" class="text-gray-800 text-sm font-semibold mx-2 hover:underline">Compétences</a>
                    <a href="#contact" class="text-gray-800 text-sm font-semibold mx-2 hover:underline">Contact</a>
                </div>
            </nav>
        </header>

        <section id="home" class="flex justify-center items-center h-screen bg-gray-100">
            <div class="text-center">
                <img src="/portfolio_gregory/image/Greg DALL-E.webp" alt="Grégory Girault" class="mx-auto rounded-full w-32 h-32 object-cover transition duration-500 ease-in-out transform hover:scale-105">

                <h1 class="text-5xl font-bold text-gray-800 mt-4">Grégory Girault</h1>
                <p class="mt-4 text-lg text-gray-600">Développeur Web Fullstack | Passionné par Symfony</p>
                <a href="#projects" class="mt-8 inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out hover:scale-105">Voir mes projets</a>
                <a href="#contact" class="mt-8 inline-block bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition duration-300 ease-in-out hover:scale-105">Contactez-moi</a>

            </div>
        </section>

        <!-- À propos -->
        <section id="about" class="bg-gray-100 py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-12">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold">À propos de moi</h2>
                        <p class="text-lg leading-relaxed m-4 text-gray-600">
                            Passionné par l'informatique, les nouvelles technologies et naviguant sur le web, j'ai exploré diverses carrières avant de découvrir ma passion pour le développement web. Mon parcours varié, de la cuisine à l'électricité, en passant par l'armée et l'horticulture, jusqu'à mon rôle chez Textilot, m'a finalement conduit à embrasser ma véritable vocation en tant que développeur web. Aujourd'hui, je suis spécialisé en Symfony et Tailwind, avec une aspiration à ouvrir ma propre entreprise de développement web.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projets -->
        <section id="projects" class="text-gray-700 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div
                    class="flex flex-wrap -m-4">
                    <!-- Projet 1 : RSE -->
                    <div class="p-4 md:w-1/2">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">Réseau Social d'Entreprise (RSE)</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">Un réseau social interne pour favoriser la communication et le partage entre les employés. Développé avec Symfony et LESS.</p>
                                <a href="page_detail_rse.html" class="mt-3 text-indigo-500 inline-flex items-center">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <!-- Projet 2 : ToDoList -->
                    <div class="p-4 md:w-1/2">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">ToDoList en Symfony</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">Une application ToDoList stylisée avec Bootstrap pour gérer les tâches quotidiennes. Implémente CRUD avec Symfony.</p>
                                <a href="page_detail_todolist.html" class="mt-3 text-indigo-500 inline-flex items-center">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compétences -->
        <section id="skills" class="bg-white py-20">
            <div class="container mx-auto px-4">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Compétences</h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">Mes compétences techniques et outils que j'utilise pour développer des solutions web.</p>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <span class="title-font font-medium">PHP</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 ml-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Symfony -->
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <span class="title-font font-medium">Symfony</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 ml-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- HTML -->
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <span class="title-font font-medium">HTML</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 ml-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- CSS -->
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <span class="title-font font-medium">CSS</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 ml-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Tailwind CSS -->
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <span class="title-font font-medium">Tailwind CSS</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 ml-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript avec l'assistance de ChatGPT -->
                    <div class="p-2 sm:w-full w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0-8v5m0-13v2m0 2c-3.866 0-7 3.134-7 7s3.134 7 7 7 7-3.134 7-7-3.134-7-7-7zm0 14c-3.866 0-7-3.134-7-7m14 0c0 3.866-3.134 7-7 7m0-14c3.866 0 7 3.134 7 7m-7-7v2m0 10v2m0-8h2m-4 0h2m4 0h2m-4 0v5"/>
                            </svg>
                            <span class="title-font font-medium ml-4">JavaScript (assisté par ChatGPT)</span>
                        </div>
                    </div>

                </div>
                <p class="text-lg text-gray-600 mt-4 text-center">Pour le développement JavaScript, j'utilise régulièrement ChatGPT pour m'assister dans la génération de code et la résolution de problèmes complexes.</p>
            </div>
        </section>

        <section id="contact" class="text-gray-700 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h2 class="text-2xl font-medium title-font mb-4 text-gray-900">Contactez-moi</h2>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Vous avez un projet en tête ? Envoyez-moi un message !</p>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <form id="contact-form" action="traitement_contact.php" method="POST" class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Nom" type="text" name="name" required>
                        </div>
                        <div class="p-2 w-1/2">
                            <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email" name="email" required>
                        </div>
                        <div class="p-2 w-full">
                            <textarea class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none h-48 focus:border-indigo-500 text-base px-4 py-2 resize-none block" placeholder="Message" name="message" required></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center mt-6">
                    <a href="https://github.com/GregGirault" target="_blank" class="text-gray-500">
                        <svg class="w-10 h-10" fill="currentColor" viewbox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.605-3.369-1.343-3.369-1.343-.454-1.155-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.112-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.851c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.699 1.028 1.592 1.028 2.683 0 3.841-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.337-.012 2.419-.012 2.747 0 .267.18.578.688.481A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/grégory-girault-420270263" target="_blank" class="ml-4 text-gray-500">
                        <svg class="w-10 h-10" fill="currentColor" viewbox="0 0 24 24">
                            <path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.3c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8-.8 1.8-1.8 1.8zm13.5 12.3h-3v-5.6c0-3.4-4-3.1-4 0v5.6h-3v-11h3v1.5c1.4-2.6 7-2.8 7 2.5v7z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- À compléter selon vos besoins -->

        <footer class="bg-white text-center p-4 text-gray-600">
            © 2024 Grégory Girault - Tous droits réservés.
        </footer>
        <script src="accueil.js"></script>
    </body>
</html>

