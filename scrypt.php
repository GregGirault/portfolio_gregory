<?php
require 'C:/xampp/htdocs/portfolio_gregory/connect.php';

// Assurez-vous d'inclure votre script de connexion à la base de données

$stmt = $db->query("SELECT ID, titre FROM projets");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $titre = $row['titre'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titre)));

    $update = $db->prepare("UPDATE projets SET slug = :slug WHERE ID = :id");
    $update->execute([':slug' => $slug, ':id' => $row['ID']]);
}

echo "Les slugs ont été mis à jour.";
