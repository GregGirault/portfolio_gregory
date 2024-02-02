<?php
session_start();
require_once('connect.php');

if ($_GET && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sélection du projet à supprimer pour obtenir le chemin de l'image
    $sql = "SELECT * FROM `projets` WHERE `ID` = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $project = $query->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        // Suppression de l'image correspondante
        $imagePath = 'image/' . $project['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Assurez-vous que ceci pointe vers un fichier et non un dossier
        } else {
            $_SESSION["errorMsg"] = "Fichier image non trouvé.";
        }

        // Correction du nom de la table dans la requête de suppression
        $sql = "DELETE FROM `projets` WHERE `ID` = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $query->execute();

        if ($result) {
            $_SESSION["success_delete_message"] = "Projet supprimé avec succès!";
        } else {
            $_SESSION["toast_error"] = "Erreur lors de la suppression du projet.";
        }

    } else {
        $_SESSION["toast_error"] = "Projet non trouvé.";
    }
} else {
    $_SESSION["toast_error"] = "Identifiant du projet non spécifié.";
}

header("Location: index.php");
exit();
