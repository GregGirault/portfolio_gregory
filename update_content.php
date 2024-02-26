<?php
session_start();
require_once("connect.php");

// Sécurité : vérification de l'accès utilisateur
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== 'Admin') {
    header("Location: login.php");
    exit();
}

// Initialisation des variables
$id = $section = $titre = $sous_titre = $paragraphe = $lien = $image = $icone = $url_bouton = $texte = $projet_id = "";
$error = '';
$success = '';

// Génération et validation du token CSRF pour sécuriser le formulaire contre les attaques CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Liste des projets
$stmt = $db->prepare("SELECT ID, titre FROM projets");
$stmt->execute();
$projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupération et affichage des données existantes si on est en mode édition
if (isset($_GET["id"]) && !empty($_GET['id']) && isset($_GET['projet_id']) && !empty($_GET['projet_id'])) {
    $id = strip_tags($_GET['id']);
    $projet_id = strip_tags($_GET['projet_id']); // Récupération de l'identifiant du projet

    $sql = "SELECT * FROM contenu WHERE id = :id AND projet_id = :projet_id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->bindValue(":projet_id", $projet_id, PDO::PARAM_INT);
    $query->execute();
    $content = $query->fetch(PDO::FETCH_ASSOC);

    if (!$content) {
        $_SESSION["toast_message"] = "Contenu introuvable pour le projet sélectionné.";
        header("Location: index.php");
        exit();
    }

    // Extraction des données pour faciliter l'affichage dans le formulaire
    extract($content);
}

// Traitement du formulaire lors de la soumission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION["toast_error"] = "Erreur de validation CSRF.";
        header("Location: modifier_contenu.php?id=" . $id . "&projet_id=" . $projet_id);
        exit();
    }

    // Nettoyage et assignation des données postées
    $id = strip_tags($_POST["id"]);
    $projet_id = strip_tags($_POST["projet_id"]); // Assurez-vous que ce champ est inclus dans votre formulaire comme un champ caché
    $section = strip_tags($_POST["section"]);
    $titre = strip_tags($_POST["titre"]);
    $sous_titre = strip_tags($_POST["sous_titre"]);
    $paragraphe = $_POST["paragraphe"];
    $lien = strip_tags($_POST["lien"]);
    $icone = strip_tags($_POST["icone"]);
    $url_bouton = strip_tags($_POST["url_bouton"]);
    $texte = $_POST["texte"];

    // Gestion de l'upload d'image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileName = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileType), $allowedExtensions)) {
            $newFileName = uniqid('img_', true) . '.' . $fileType; // Création d'un nom de fichier unique
            $uploadPath = __DIR__ . '/uploads/' . $newFileName;

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $image = $newFileName;
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            }
        } else {
            $error = "Type de fichier non autorisé.";
        }
    }

    // Mise à jour de la base de données si aucune erreur
    if (empty($error)) {
        $sql = "UPDATE contenu SET section=:section, titre=:titre, sous_titre=:sous_titre, paragraphe=:paragraphe, lien=:lien, image=:image, icone=:icone, url_bouton=:url_bouton, texte=:texte WHERE id = :id AND projet_id = :projet_id";
        $query = $db->prepare($sql);
        $query->execute([
            ':section' => $section,
            ':titre' => $titre,
            ':sous_titre' => $sous_titre,
            ':paragraphe' => $paragraphe,
            ':lien' => $lien,
            ':image' => $image,
            ':icone' => $icone,
            ':url_bouton' => $url_bouton,
            ':texte' => $texte,
            ':id' => $id,
            ':projet_id' => $projet_id
        ]);

        $_SESSION["toast_success"] = "Contenu mis à jour avec succès pour le projet sélectionné.";
        header("Location: index.php");
        exit();
    }
}

require_once("close.php");
