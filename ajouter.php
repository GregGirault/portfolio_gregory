<?php
session_start();
require_once("connect.php");

$error = '';



// Générer et stocker le token CSRF si nécessaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Vérification du token CSRF lors de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Continuer avec le traitement du formulaire
        if (!empty($_POST["titre"]) && !empty($_POST["description"]) && !empty($_FILES["image"]["name"]) && !empty($_POST["categorie_id"])) {
            $titre = strip_tags($_POST["titre"]);
            $description = strip_tags($_POST["description"]);
            $categorieId = $_POST["categorie_id"];

            $image_name = $_FILES["image"]["name"];
            $image_temp = $_FILES["image"]["tmp_name"];
            $new_image_name = uniqid() . '-' . $image_name;
            $image_destination = 'image/' . $new_image_name;

            if (move_uploaded_file($image_temp, $image_destination)) {
                $sql = "INSERT INTO projets (titre, description, categorie_id, image, date_creation) VALUES (:titre, :description, :categorie_id, :image, NOW())";
                $stmt = $db->prepare($sql);
                $stmt->execute([':titre' => $titre, ':description' => $description, ':categorie_id' => $categorieId, ':image' => $new_image_name]);

                $_SESSION["success_add_message"] = "Projet ajouté avec succès.";
                header("Location: index.php");
                exit();
            } else {
                $error = "Erreur lors du téléchargement de l'image.";
            }
        } else {
            $error = "Tous les champs sont requis.";
        }
    } else {
        $error = "Erreur de validation CSRF.";
    }
    // Réinitialiser le token CSRF après la soumission
    unset($_SESSION['csrf_token']);
}

// Récupération des catégories
$categories = $db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

require_once("close.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Ajout de projets</title>
    </head>
    <body class="bg-gray-100 font-poppins">
        <div class="container mx-auto mt-10 max-w-4xl">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Ajout de projets</h1>
            <?php if (!empty($error)): ?>
                <div class="bg-red-500 text-white font-bold rounded px-4 py-3" role="alert"><?= $error ?></div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Projet</label>
                    <input type="text" name="titre" id="titre" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <span class="block text-gray-700 text-sm font-bold mb-2">Catégorie</span>
                    <div class="flex flex-wrap">
                        <?php foreach ($categories as $categorie): ?>
                            <label class="inline-flex items-center mr-6">
                                <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="categorie_id" value="<?= $categorie['ID']; ?>">
                                <span class="ml-2 text-gray-700"><?= $categorie['nom']; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="upload" class="block text-gray-700 text-sm font-bold mb-2">Envoyer image</label>
                    <input type="file" name="image" id="upload" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <input type="submit" value="Ajouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <a href="index.php" class="inline-block align-baseline font-bold text-sm text-zinc-500 hover:text-zinc-700">Retour</a>
                </div>
            </form>
        </div>
        <script src="ajout.js"></script>
    </body>
</html>

