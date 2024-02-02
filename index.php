<?php
session_start();
require_once("connect.php");


// Gestion des messages de succès
if (isset($_SESSION["success_message"])) {
    echo "<div class='success-message'>" . $_SESSION["success_message"] . "</div>";
    // Effacer le message après l'affichage
    unset($_SESSION["success_message"]);
}

// Vérification si l'utilisateur est connecté et est un admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'Admin') {
    // Si l'utilisateur n'est pas connecté ou n'est pas un admin, rediriger vers la page de login
    header("Location: login.php");
    exit();
}

// Traitement du formulaire d'ajout ou de mise à jour de projet
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification de la présence et du remplissage des champs nécessaires
    if (
        isset($_POST["titre"], $_POST["description"], $_POST["image"]) &&
        !empty($_POST["titre"]) && !empty($_POST["description"]) && !empty($_POST["image"])
    ) {

        // Nettoyage des données reçues
        $titre = strip_tags($_POST["titre"]);
        $description = strip_tags($_POST["description"]);
        $image = strip_tags($_POST["image"]);
        $archiver = isset($_POST["archiver"]) ? 1 : 0; // Gestion de la case à cocher 'archiver'
        $categorieId = $_POST["categorie_id"] ?? 1; // ID de catégorie par défaut à 1 si non spécifié

        // Si l'ID du projet est présent, c'est une mise à jour, sinon c'est un ajout
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Mise à jour d'un projet existant
            $id = $_POST["id"];
            $sql = "UPDATE projets SET titre = :titre, description = :description, image = :image, archiver = :archiver, date_modification = NOW() WHERE ID = :id";
            $message = "Projet mis à jour avec succès.";
        } else {
            // Ajout d'un nouveau projet
            $sql = "INSERT INTO projets (titre, description, image, archiver, date_creation, categorie_id) VALUES (:titre, :description, :image, :archiver, NOW(), :categorie_id)";
            $message = "Projet ajouté avec succès.";
        }

        $query = $db->prepare($sql);
        $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":archiver", $archiver, PDO::PARAM_INT);
        $query->bindValue(":categorie_id", $categorieId, PDO::PARAM_INT);

        if (isset($id)) {
            // Bind de l'ID pour la mise à jour
            $query->bindValue(":id", $id, PDO::PARAM_INT);
        }

        $query->execute();

        // Message de succès à afficher sur la page de redirection
        $_SESSION["success_message"] = $message;
        header("Location: index.php");
        exit();
    } else {
        // Redirection en cas de champs manquants
        header("Location: ajouter.php");
        exit();
    }
}

// Paramètres de pagination
$parPage = 5;
$currentPage = isset($_GET['page']) && !empty($_GET['page']) ? (int) $_GET['page'] : 1;
$premier = ($currentPage - 1) * $parPage;

// Récupération du nombre total de projets
$sql = 'SELECT COUNT(*) AS nb_projets FROM `projets`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetch();
$nbProjets = (int) $result['nb_projets'];
$pages = ceil($nbProjets / $parPage);

// Récupération des projets pour la page actuelle avec le nom de la catégorie
$sql = 'SELECT projets.*, categories.nom AS categorie_nom FROM projets 
        LEFT JOIN categories ON projets.categorie_id = categories.ID 
        ORDER BY projets.titre ASC 
        LIMIT :premier, :parpage';
$query = $db->prepare($sql);
$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$query->execute();
$projects = $query->fetchAll(PDO::FETCH_ASSOC);

// Gestion des messages toast
$successMsg = $_SESSION["toast_message"] ?? '';
$errorMsg = $_SESSION["toast_error"] ?? '';
unset($_SESSION["toast_message"]);
unset($_SESSION["toast_error"]);

// Fermeture de la connexion à la base de données
require_once "close.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Historique des projets</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            .text-green-500 {
                color: #10b981;
            } /* Ensure this matches Tailwind's green-500 */
        </style>
    </head>
    <body class="bg-gray-100 font-poppins">
        <div class="container mx-auto p-8">

            <?php if (isset($_SESSION["success_add_message"])): ?>
                <div class="bg-green-500 text-white font-bold rounded px-4 py-3 mb-4 relative" role="alert">
                    <button class="close absolute top-0 right-0 transform hover:rotate-180 transition-transform duration-500 mt-2 mr-2">&times;</button>
                    <?= $_SESSION["success_add_message"]; ?>
                    <?php unset($_SESSION["success_add_message"]); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION["success_delete_message"])): ?>
                <div class="bg-green-500 text-white font-bold rounded px-4 py-3 mb-4 relative" role="alert">
                    <button class="close absolute top-0 right-0 transform hover:rotate-180 transition-transform duration-500 mt-2 mr-2">&times;</button>
                    <?= $_SESSION["success_delete_message"]; ?>
                    <?php unset($_SESSION["success_delete_message"]); ?>
                </div>
            <?php endif; ?>


            <h1 class="text-2xl font-semibold mb-4 text-center">Historique des ajouts</h1>
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-left text-sm uppercase font-bold">Titre</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-left text-sm uppercase font-bold">Description</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Image</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Archivé</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Date de Création</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Date de Modification</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Catégorie</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Actions</th>
                        <th class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">Archiver/Désarchiver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project): ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($project['titre']) ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($project['description']) ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <img src="image/<?= htmlspecialchars($project['image']) ?>" alt="Image du projet" class="w-20 h-20 object-cover mx-auto">
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm archived-cell">
                                <?= $project['archiver'] ? '<span class="text-green-500">Oui</span>' : '<span class="text-orange-500">Non</span>' ?>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($project['date_creation']) ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($project['date_modification']) ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($project['categorie_nom']) ?></td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <!-- Lien de modification -->
                                <a href="modifier.php?id=<?= $project['ID'] ?>" class="text-amber-500 hover:text-amber-700 font-bold block mb-2">
                                    <i class="fas fa-edit"></i>
                                    Modifier
                                </a>

                                <!-- Lien de suppression -->
                                <a href="supprimer.php?id=<?= $project['ID'] ?>" class="text-red-500 hover:text-red-700 font-bold block delete-project-link">
                                    <i class="fas fa-trash-alt"></i>
                                    Supprimer
                                </a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <a href="archiver.php" class="archiver-link flex items-center justify-center" data-project-id="<?= $project['ID'] ?>">
                                    <i class="<?= $project['archiver'] ? 'fa-solid fa-folder-open' : 'fa-solid fa-box-archive' ?> text-green-500"></i>
                                    <span class="ml-2 text-green-500 font-bold hover:text-green-700"><?= $project['archiver'] ? 'Désarchiver' : 'Archiver' ?></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center items-center py-4 space-x-2">
            <a href="./index.php?page=<?= max(1, $currentPage - 1); ?>" class="px-4 py-2 text-blue-500 hover:text-blue-700">&laquo; Précédente</a>
            <div class="flex space-x-1">
                <?php for ($page = 1; $page <= $pages; $page++): ?>
                    <a href="./index.php?page=<?= $page; ?>" class="px-4 py-2 <?= ($currentPage == $page) ? 'text-blue-600' : 'text-blue-500 hover:text-blue-700'; ?>"><?= $page; ?></a>
                <?php endfor; ?>
            </div>
            <a href="./index.php?page=<?= min($pages, $currentPage + 1); ?>" class="px-4 py-2 text-blue-500 hover:text-blue-700">Suivante &raquo;</a>
        </div>

        <div class="flex justify-center mt-8">
            <a href="ajouter.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un projet</a>
            <a href="accueil.php" class="bg-teal-400 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded ml-4">Portfolio</a>
            <a href="deconnexion.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4">Déconnexion</a>
        </div>

        <script src="ajout.js"></script>
    </body>
</html>

