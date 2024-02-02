<?php
session_start();
require_once("connect.php");

header('Content-Type: application/json');

if (!isset($_SESSION["username"])) {
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT archiver FROM projets WHERE ID = :id");
    $stmt->execute([':id' => $id]);
    $project = $stmt->fetch();

    if ($project) {
        $newState = $project['archiver'] ? 0 : 1;
        $stmt = $db->prepare("UPDATE projets SET archiver = :newState WHERE ID = :id");
        $stmt->execute([':newState' => $newState, ':id' => $id]);

        echo json_encode(['archived' => (bool) $newState]);
    } else {
        echo json_encode(['error' => 'Project not found']);
    }
} else {
    echo json_encode(['error' => 'No ID provided']);
}