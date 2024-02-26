<?php
require_once 'connect.php'; // Script de connexion à la base de données.

class ContentManager
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getContentBySection($section)
    {
        $stmt = $this->db->prepare("SELECT * FROM contenu WHERE section = :section");
        $stmt->execute([':section' => $section]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSingleContentBySection($section)
    {
        $stmt = $this->db->prepare("SELECT * FROM contenu WHERE section = :section LIMIT 1");
        $stmt->execute([':section' => $section]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getGalerieImages()
    {
        $stmt = $this->db->prepare("SELECT chemin, description FROM images");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

$contentManager = new ContentManager($db);

$headerContent = $contentManager->getSingleContentBySection('header');
$introContent = $contentManager->getSingleContentBySection('intro');
$aboutContent = $contentManager->getSingleContentBySection('about');
$featuresContent = $contentManager->getContentBySection('features');
$imagesGalerie = $contentManager->getGalerieImages();
$lienURLContent = $contentManager->getSingleContentBySection('lienURL');
$footerContent = $contentManager->getSingleContentBySection('footer');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En savoir plus - RSE de David Kenos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

</head>

<body class="bg-gray-50 font-sans">

    <!-- Header -->
    <header class="body-font bg-indigo-600 text-white" data-aos="fade-down" data-aos-delay="50"
        data-aos-duration="1000">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row justify-between items-center"
            data-aos="fade-down" data-aos-duration="1000">
            <a href="#" class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
                <span class="ml-3 text-xl">
                <?= htmlspecialchars($headerContent['titre']) ?>
                </span>
            </a>
            <button id="burgerMenuButton"
                class="text-white inline-flex p-3 hover:bg-indigo-700 rounded md:hidden ml-auto hover:text-white outline-none">
                <i class="fas fa-bars"></i>
            </button>
            <div class="md:hidden" id="burgerMenu" style="display: none;">
                <a href="#about" class="block py-2 px-4 text-white hover:bg-indigo-700">À Propos</a>
                <a href="#features" class="block py-2 px-4 text-white hover:bg-indigo-700">Fonctionnalités</a>
                <a href="#galerie" class="block py-2 px-4 text-white hover:bg-indigo-700">Galerie</a>
                <a href="accueil.php" class="block py-2 px-4 text-white hover:bg-indigo-700">Retour à l'accueil</a>
            </div>
            <nav class="md:ml-auto md:flex hidden flex-wrap items-center text-base justify-center">
                <a href="#about" class="mr-5 hover:text-indigo-200">À Propos</a>
                <a href="#features" class="mr-5 hover:text-indigo-200">Fonctionnalités</a>
                <a href="#galerie" class="mr-5 hover:text-indigo-200">Galerie</a>
            </nav>
            <a href="accueil.php"
                class="hidden md:inline-flex items-center bg-indigo-700 hover:bg-indigo-800 border-0 py-2 px-4 focus:outline-none rounded text-base mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
            </a>
        </div>
    </header>



    <!-- Section Intro -->
    <section class="bg-white text-gray-800 body-font" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-1/6 md:w-1/3 w-1/2 mb-10 object-cover object-center rounded"
                src="<?= htmlspecialchars($introContent['image']) ?>" alt="logo david kenos">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">
                    <?= htmlspecialchars($introContent['titre']) ?>
                </h1>
                <p class="mb-8 leading-relaxed">
                    <?= htmlspecialchars($introContent['paragraphe']) ?>
                </p>
                <div class="flex justify-center">
                    <a href="#about"
                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg transition-colors duration-300">En
                        savoir plus</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Section À Propos du Projet -->
    <section id="about" class="bg-gray-100 text-gray-800 body-font" data-aos="zoom-in" data-aos-delay="150"
        data-aos-duration="1000">
        <div class="container mx-auto py-24">
            <div class="flex flex-col items-center">
                <div class="lg:w-2/3 w-full bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                    data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                    <div class="p-8">
                        <h2 class="text-3xl font-semibold text-center">
                            <?= htmlspecialchars($aboutContent['titre']) ?>
                        </h2>
                        <p class="mt-4 text-lg text-center">
                            <?= htmlspecialchars($aboutContent['paragraphe']) ?>
                        </p>
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
     <section id="features" class="bg-gray-100 text-gray-800 body-font" data-aos="zoom-in" data-aos-delay="150"
        data-aos-duration="1000">
    <div class="flex flex-wrap justify-center py-12 bg-white">
        <?php foreach ($featuresContent as $feature): ?>
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="zoom-in" data-aos-delay="200"
                data-aos-duration="1000">
                <div
                    class="p-6 rounded-lg bg-gray-100 shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                    <div class="mb-4">
                        <div
                            class="w-12 h-12 mb-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white">
                            <i class="<?= htmlspecialchars($feature['icone']) ?> fa-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            <?= htmlspecialchars($feature['titre']) ?>
                        </h3>
                    </div>
                    <p>
                        <?= htmlspecialchars($feature['paragraphe']) ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>





    <!-- Section "Démonstration et Galerie" -->
    <section id="galerie" class="py-12 bg-gray-50" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-semibold text-gray-900">Galerie</h2>
                <p class="mt-4 text-lg text-gray-600">Plongez dans une visite guidée du RSE avec des représentations
                    visuelles démontrant les fonctionnalités en action.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <?php foreach ($imagesGalerie as $image): ?>
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <a href="<?= htmlspecialchars($image['chemin']) ?>" data-fancybox="gallery">
                            <img src="<?= htmlspecialchars($image['chemin']) ?>"
                                alt="<?= htmlspecialchars($image['description']) ?>"
                                class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        </a>
                    </div>
                <?php endforeach; ?>
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

    <section id="details" class="bg-gray-100 text-gray-800 body-font py-24" data-aos="zoom-out" data-aos-delay="250"
        data-aos-duration="1000">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold text-center mb-6">
                <?= htmlspecialchars($lienURLContent['titre']) ?>
            </h2>
            <p class="text-lg text-center max-w-4xl mx-auto mb-6">
                <?= htmlspecialchars($lienURLContent['paragraphe']) ?>
            </p>
            <div class="flex justify-center mt-6">
                <a href="<?= htmlspecialchars($lienURLContent['url_bouton']) ?>" target="_blank"
                    class="inline-flex items-center bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600 transition-colors ease-in-out duration-300">
                    Visitez le site
                </a>
            </div>
        </div>
    </section>
    <footer class="text-gray-600 body-font bg-indigo-600">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row items-center">
            <p class="text-gray-100 text-sm text-center sm:text-left"><?= htmlspecialchars($footerContent['texte']) ?>
                <a href="mentions-legales.php" class="text-gray-100 ml-1" rel="noopener noreferrer"
                    target="_blank">Mentions Légales</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 justify-center sm:justify-start items-center">
                <div class="fixed bottom-6 right-10 z-50 flex items-center">
                    <a href="#" id="scrollToTop"
                        class="text-gray-100 hover:text-gray-200 flex items-center transition duration-300 ease-in-out relative">
                        <span class="absolute -inset-1 bg-transparent rounded-full" id="iconCircle"></span>
                        <i class="fa-solid fa-angles-up font-bold text-xl relative"></i>
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
    <script src="esp.js"></script>

</body>

</html>