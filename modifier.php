<?php
session_start();
require_once("connect.php");

// Vérification de l'accès utilisateur
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'Admin') {
    header("Location: login.php");
    exit();
}

// Initialisation des variables
$id = $titre = $description = $categorie_id = $image = "";
$produit = null;
$error = '';
$success = '';

// Génération et stockage du token CSRF si nécessaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Vérification et récupération de l'ID du projet
if (isset($_GET["id"]) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM projets WHERE ID = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $produit = $query->fetch();

    if (!$produit) {
        $_SESSION["toast_message"] = "Projet introuvable.";
        header("Location: index.php");
        exit();
    }

    $titre = $produit['titre'];
    $description = $produit['description'];
    $categorie_id = $produit['categorie_id'];
    $image = $produit['image'];
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Validation CSRF
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION["toast_error"] = "Erreur de validation CSRF.";
        header("Location: modifier.php?id=" . $id);
        exit();
    } else {
        $id = strip_tags($_POST["id"]);
        $titre = strip_tags($_POST["titre"]);
        $description = strip_tags($_POST["description"]);
        $categorie_id = strip_tags($_POST["categorie_id"]);

        // Gestion de l'image
        if (!empty($_FILES["image"]["name"])) {
            $image = $_FILES["image"]["name"];
            $image_temp = $_FILES["image"]["tmp_name"];
            $image_destination = './image/' . basename($image);

            if (!file_exists('./image/')) {
                mkdir('./image/', 0777, true);
            }

            if (!move_uploaded_file($image_temp, $image_destination)) {
                $_SESSION["toast_error"] = "Erreur lors du téléchargement de l'image.";
                header("Location: modifier.php?id=" . $id);
                exit();
            }
        }

        $sql = "UPDATE projets SET titre=:titre, description=:description, image=:image, categorie_id=:categorie_id WHERE ID = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":categorie_id", $categorie_id, PDO::PARAM_INT);
        $result = $query->execute();

        if ($result) {
            $_SESSION["toast_modify"] = "Projet $titre modifié avec succès.";
        } else {
            $_SESSION["toast_error"] = "Erreur lors de la mise à jour du projet.";
        }
        header("Location: index.php");
        exit();
    }
}

require_once("close.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Modification de projet</title>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4">
            <h1 class="text-xl font-bold text-gray-700 my-4">Modification du projet
                <?= htmlspecialchars($titre) ?></h1>
            <?php if (isset($_SESSION["toast_message"])): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p><?= $_SESSION["toast_message"];
                    unset($_SESSION["toast_message"]); ?></p>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION["toast_error"])): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p><?= $_SESSION["toast_error"];
                    unset($_SESSION["toast_error"]); ?></p>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                    <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($titre) ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($description) ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="categorie_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie ID:</label>
                    <input type="number" name="categorie_id" id="categorie_id" value="<?= htmlspecialchars($categorie_id) ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image (laisser vide pour conserver l'image actuelle):</label>
                    <input type="file" name="image" id="image" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <small>Image actuelle:
                        <?= htmlspecialchars($image) ?></small>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer les modifications</button>
                    <a href="index.php" class="inline-block align-baseline font-bold text-sm text-stone-500 hover:text-stone-700">Retour</a>
                </div>
            </form>
        </div>
    </body>
</html>

