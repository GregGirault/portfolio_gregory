<?php
session_start();
require_once("connect.php");

// $projetExistant = null; // Variable pour stocker les données du projet existant
// if (isset($_GET['projet_id']) && !empty($_GET['projet_id'])) {
//     $projetId = (int) $_GET['projet_id'];
//     $stmt = $db->prepare("SELECT * FROM projets WHERE ID = :projetId");
//     $stmt->bindParam(':projetId', $projetId, PDO::PARAM_INT);
//     $stmt->execute();
//     $projetExistant = $stmt->fetch(PDO::FETCH_ASSOC);
// }


// Vérification si l'utilisateur est connecté et est un admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'Admin') {
    header("Location: login.php");
    exit();
}

$contentData = []; // Initialisez cette variable avec les données récupérées

// Traitement du formulaire d'ajout ou de mise à jour de projet
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification de la présence et du remplissage des champs nécessaires
    $titre = isset($_POST["titre"]) ? strip_tags($_POST["titre"]) : '';
    $description = isset($_POST["description"]) ? strip_tags($_POST["description"]) : '';
    $categorieId = isset($_POST["categorie_id"]) ? (int) $_POST["categorie_id"] : 1;
    $archiver = isset($_POST["archiver"]) ? 1 : 0;
    $image = isset($_POST["image"]) ? strip_tags($_POST["image"]) : '';

    if (!empty($titre) && !empty($description) && !empty($image)) {
        // Gestion de l'image si une nouvelle a été téléchargée
        if (!empty($_FILES["image"]["name"])) {
            $image = $_FILES["image"]["name"];
            $image_temp = $_FILES["image"]["tmp_name"];
            $image_destination = './image/' . basename($image); // Sécurisation du nom de fichier

            if (!file_exists('./image/')) {
                mkdir('./image/', 0777, true);
            }

            if (!move_uploaded_file($image_temp, $image_destination)) {
                $_SESSION["toast_message"] = "Erreur lors du téléchargement de l'image.";
                header("Location: modifier.php?id=" . $id);
                exit();
            }
        }

        // Préparation de la requête SQL
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $id = $_POST["id"];
            $sql = "UPDATE projets SET titre = :titre, description = :description, image = :image, archiver = :archiver, categorie_id = :categorie_id, date_modification = NOW() WHERE ID = :id";
        } else {
            $sql = "INSERT INTO projets (titre, description, image, archiver, categorie_id, date_creation) VALUES (:titre, :description, :image, :archiver, :categorie_id, NOW())";
        }

        $query = $db->prepare($sql);
        $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":archiver", $archiver, PDO::PARAM_INT);
        $query->bindValue(":categorie_id", $categorieId, PDO::PARAM_INT);
        if (isset($id)) {
            $query->bindValue(":id", $id, PDO::PARAM_INT);
        }

        // Exécution de la requête
        if ($query->execute()) {
            $_SESSION["toast_modify"] = isset($id) ? "Le projet a été mis à jour avec succès." : "Le projet a été ajouté avec succès.";
            header("Location: index.php"); // Assurez-vous que cette redirection se fait après la définition du message
            exit();
        } else {
            $_SESSION["toast_message"] = "Une erreur est survenue lors de l'opération
sur le projet.";
            header("Location: index.php");
            exit();
        }

    } else {
        $_SESSION["toast_message"] = "Veuillez remplir tous les champs requis.";
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
        }

        /* Ensure this matches Tailwind's green-500 */
    </style>
</head>

<body class="bg-gray-100 font-poppins">
    <div class="container mx-auto p-8">

        <?php if (isset($_SESSION["success_add_message"])): ?>
            <div class="bg-green-500 text-white font-bold rounded px-4 py-3 mb-4 relative" role="alert">
                <button class="close absolute top-0 right-0 transition-transform duration-500 mt-2 mr-2">&times;</button>
                <?= $_SESSION["success_add_message"]; ?>
                <?php unset($_SESSION["success_add_message"]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["success_delete_message"])): ?>
            <div class="bg-green-500 text-white font-bold rounded px-4 py-3 mb-4 relative" role="alert">
                <button class="close absolute top-0 right-0 transition-transform duration-500 mt-2 mr-2">&times;</button>
                <?= $_SESSION["success_delete_message"]; ?>
                <?php unset($_SESSION["success_delete_message"]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["toast_modify"])): ?>
            <div class="bg-green-500 text-white font-bold rounded px-4 py-3 mb-4 relative" role="alert">
                <p>
                    <?= $_SESSION["toast_modify"] ?>
                </p>
                <button class="close absolute top-0 right-0 transition-transform duration-500 mt-2 mr-2">&times;</button>
            </div>
            <?php
            unset($_SESSION["toast_modify"]);
            unset($_SESSION["toast_type"]);
            ?>
        <?php endif; ?>


        <h1 class="text-2xl font-semibold mb-4 text-center text-gray-700">Historique des ajouts</h1>
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-left text-sm uppercase font-bold">
                        Titre</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-left text-sm uppercase font-bold">
                        Description</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Image</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Archivé</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Date de Création</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Date de Modification</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Catégorie</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Actions</th>
                    <th
                        class="px-5 py-3 bg-white border-b border-gray-200 text-violet-700 text-center text-sm uppercase font-bold">
                        Archiver/Désarchiver</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-semibold text-gray-600">
                            <?= htmlspecialchars($project['titre']) ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-semibold text-gray-600">
                            <?= htmlspecialchars($project['description']) ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center font-semibold">
                            <img src="image/<?= htmlspecialchars($project['image']) ?>" alt="Image du projet"
                                class="w-20 h-20 object-cover mx-auto">
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm archived-cell">
                            <?= $project['archiver'] ? '<span class="text-orange-500 font-bold">Oui</span>' : '<span class="text-green-500 font-bold">Non</span>' ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-semibold text-gray-600">
                            <?= htmlspecialchars($project['date_creation']) ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-semibold text-gray-600">
                            <?= htmlspecialchars($project['date_modification']) ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-semibold text-gray-600">
                            <?= htmlspecialchars($project['categorie_nom']) ?>
                        </td>
                        <td
                            class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center font-semibold text-gray-600">
                            <!-- Lien de modification -->
                            <a href="modifier.php?id=<?= $project['ID'] ?>"
                                class="text-amber-500 hover:text-amber-700 font-bold block mb-2">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </a>

                            <!-- Lien de suppression -->
                            <a href="supprimer.php?id=<?= $project['ID'] ?>"
                                class="text-red-500 hover:text-red-700 font-bold block delete-project-link">
                                <i class="fas fa-trash-alt"></i>
                                Supprimer
                            </a>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                            <a href="archiver.php" class="archiver-link flex items-center justify-center"
                                data-project-id="<?= $project['ID'] ?>">
                                <i
                                    class="<?= $project['archiver'] ? 'fa-solid fa-folder-open' : 'fa-solid fa-box-archive' ?> text-green-500"></i>
                                <span class="ml-2 text-green-500 font-bold hover:text-green-700">
                                    <?= $project['archiver'] ? 'Désarchiver' : 'Archiver' ?>
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="flex justify-center items-center py-4 space-x-2">
        <a href="./index.php?page=<?= max(1, $currentPage - 1); ?>"
            class="px-4 py-2 text-blue-500 hover:text-blue-700 font-semibold">&laquo; Précédente</a>
        <div class="flex space-x-1">
            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <a href="./index.php?page=<?= $page; ?>"
                    class="px-4 py-2 <?= ($currentPage == $page) ? 'text-blue-600' : 'text-blue-500 hover:text-blue-700'; ?>">
                    <?= $page; ?>
                </a>
            <?php endfor; ?>
        </div>
        <a href="./index.php?page=<?= min($pages, $currentPage + 1); ?>"
            class="px-4 py-2 text-blue-500 hover:text-blue-700 font-semibold">Suivante &raquo;</a>
    </div>

    <div class="flex justify-center mt-8">
        <a href="ajouter.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un
            projet</a>
        <a href="accueil.php"
            class="bg-teal-400 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded ml-4">Portfolio
        </a>
        <a href="deconnexion.php"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4">Déconnexion
        </a>

        <a href="modification_projets.php"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Modifier projets
        </a>

    </div>





    <script src="ajout.js"></script>
</body>

</html>