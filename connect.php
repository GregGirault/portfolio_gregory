<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_gregory";

try {
  $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

