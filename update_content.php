<?php
session_start();
require_once 'connect.php';

// Sécurité: Vérifiez si l'utilisateur est authentifié et autorisé
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.php');
    exit('Accès refusé.');
}

function uploadImage($imageField)
{
    $targetDirectory = __DIR__ . "/images/";
    $imagePath = null;

    if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
        $fileName = basename($_FILES[$imageField]['name']);
        $newFileName = time() . "-" . $fileName;
        $targetFilePath = $targetDirectory . $newFileName;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        if (!in_array($fileType, ['jpg', 'png', 'gif'])) {
            throw new Exception("Format de fichier non autorisé.");
        }

        if (!move_uploaded_file($_FILES[$imageField]['tmp_name'], $targetFilePath)) {
            throw new Exception("Le téléchargement de l'image a échoué.");
        }

        $imagePath = $newFileName;
    }

    return $imagePath;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $projet_id = filter_input(INPUT_POST, 'projet_id', FILTER_SANITIZE_NUMBER_INT);
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_STRING);
        $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
        $contenu = filter_input(INPUT_POST, 'contenu', FILTER_SANITIZE_STRING);
        $imagePath = uploadImage('image');

        $params = [':projet_id' => $projet_id, ':section' => $section, ':titre' => $titre, ':contenu' => $contenu];
        $sql = "UPDATE contenu SET titre = :titre, contenu = :contenu" . ($imagePath ? ", image = '$imagePath'" : "") . " WHERE projet_id = :projet_id AND section = :section";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        $_SESSION['flash_message'] = "La mise à jour a été effectuée avec succès.";
    } catch (Exception $e) {
        $_SESSION['flash_message'] = "Erreur lors de la mise à jour : " . $e->getMessage();
    }

    header('Location: backoffice.php');
    exit;
}

// Si la méthode n'est pas POST, redirection vers la page d'accueil ou de connexion
header('Location: index.php');
exit;
