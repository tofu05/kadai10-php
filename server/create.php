<?php
$pdo = new PDO("mysql:host=;dbname=;charset=utf8", "", "");

$name = $_POST['name'] ?? '';
$pass = $_POST['pass'] ?? '';

if ($name && $pass) {
    $stmt = $pdo->prepare("INSERT INTO names (name, pass) VALUES (:name, :pass)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
}
?>