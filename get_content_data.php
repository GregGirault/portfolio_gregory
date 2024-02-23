<?php
require_once 'connect.php';

if (isset($_GET['projet_id']) && isset($_GET['section'])) {
    $projet_id = $_GET['projet_id'];
    $section = $_GET['section'];

    $stmt = $db->prepare("SELECT * FROM contenu WHERE projet_id = :projet_id AND section = :section LIMIT 1");
    $stmt->execute([':projet_id' => $projet_id, ':section' => $section]);
    $content = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($content);
    exit;
}
