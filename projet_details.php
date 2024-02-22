<?php
require_once 'connect.php';

$slug = $_GET['slug'] ?? null;

if ($slug) {
    // Décode le slug HTML encodé dans l'URL
    $slug = html_entity_decode($slug);

    $stmt = $db->prepare("SELECT * FROM projets WHERE slug = :slug AND archiver = 0");
    $stmt->execute([':slug' => $slug]);
    $projet = $stmt->fetch();

    if (!$projet) {
        // Si aucun projet n'est trouvé, affichez un message et arrêtez l'exécution du script.
        echo "Projet non trouvé ou archivé.";
        exit;
    }
} else {
    // Si aucun slug n'est spécifié, affichez un message et arrêtez l'exécution du script.
    echo "Aucun slug de projet spécifié.";
    exit;
}

?>


<!-- Header -->
<header class="body-font bg-indigo-600 text-white" data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row justify-between items-center" data-aos="fade-down" data-aos-duration="1000">
        <a href="#" class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
            <span class="ml-3 text-xl"><?= htmlspecialchars($projet['titre'], ENT_QUOTES, 'UTF-8'); ?>
            </span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="#about" class="mr-5 hover:text-indigo-200">À Propos</a>
            <a href="#features" class="mr-5 hover:text-indigo-200">Fonctionnalités</a>
            <a href="#galerie" class="mr-5 hover:text-indigo-200">Galerie</a>
        </nav>
        <a href="accueil.php"
            class="inline-flex items-center bg-indigo-700 hover:bg-indigo-800 border-0 py-2 px-4 focus:outline-none rounded text-base mt-4 md:mt-0">
            <i class="fas fa-arrow-left mr-2"></i>Retour à l'accueil
        </a>
    </div>
</header>

<!-- Section Intro -->
<section class="bg-white text-gray-800 body-font" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <img class="lg:w-1/6 md:w-1/3 w-1/2 mb-10 object-cover object-center rounded"
            src="/portfolio_gregory/image/<?= htmlspecialchars($projet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="logo">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">
                <?= htmlspecialchars($projet['titre'], ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <p class="mb-8 leading-relaxed">
                <?= htmlspecialchars($projet['description'], ENT_QUOTES, 'UTF-8'); ?>
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
                    <h2 class="text-3xl font-semibold text-center">Innovation & Engagement</h2>
                    <p class="mt-4 text-lg text-center">Découvrez l'impact de notre Réseau Social d'Entreprise (RSE) sur
                        l'innovation et l'engagement des employés. Un écosystème favorisant la collaboration, l'échange
                        d'idées et la construction d'une culture d'entreprise unie et dynamique.</p>
                    <div class="mt-6 flex justify-center">
                        <a href="#details"
                            class="inline-flex items-center bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600 transition-colors ease-in-out duration-300">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>