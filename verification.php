<?php
session_start();

// Vérifier si les données du formulaire ont été soumises
if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once 'connect.php'; // Utiliser le fichier de connexion PDO existant

    // Échapper les valeurs pour la sécurité
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Préparer la requête pour éviter les injections SQL
        $stmt = $db->prepare("SELECT ID, username, password, role_id FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['ID'];

            // Récupérer et stocker le rôle de l'utilisateur
            $roleStmt = $db->prepare("SELECT nom FROM roles WHERE ID = :role_id");
            $roleStmt->execute([':role_id' => $user['role_id']]);
            $role = $roleStmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['role'] = $role['nom'];

            // Rediriger vers la page d'accueil
            header('Location: index.php');
            exit;
        } else {
            // Redirection avec une erreur si l'authentification échoue
            header('Location: login.php?erreur=1'); // Utilisateur ou mot de passe incorrect
            exit;
        }
    } else {
        // Redirection si l'un des champs est vide
        header('Location: login.php?erreur=2'); // Utilisateur ou mot de passe vide
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
