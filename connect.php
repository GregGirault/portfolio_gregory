<?php
// Charge l'autoloader généré par Composer
require_once __DIR__ . '/vendor/autoload.php';

// Crée une instance immuable de Dotenv et charge les variables d'environnement du fichier .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Récupère les informations de connexion à la base de données depuis les variables d'environnement
$servername = $_ENV['DB_SERVER'] ?? 'localhost';
$username = $_ENV['DB_USERNAME'] ?? 'root';
$password = $_ENV['DB_PASSWORD'] ?? '';
$dbname = $_ENV['DB_NAME'] ?? 'portfolio_gregory';



try {
  // Tente d'établir une connexion à la base de données avec PDO
  $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active le mode d'erreur exception
    PDO::ATTR_EMULATE_PREPARES => false, // Désactive l'émulation des requêtes préparées
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Définit le mode de récupération par défaut
  ]);
} catch (PDOException $e) {
  // En cas d'erreur de connexion, log l'erreur sans révéler de détails sensibles à l'utilisateur
  error_log("Connection failed: " . $e->getMessage());
  // Affiche un message d'erreur générique à l'utilisateur
  echo "Une erreur s'est produite, veuillez réessayer plus tard.";
}
