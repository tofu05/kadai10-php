<?php
session_start();
if (!isset($_SESSION['user'])) {
    exit;
}

$pdo = new PDO("mysql:host=;dbname=;charset=utf8", "", "");

$password = $_POST['password'] ?? '';

if ($password) {
    $userId = $_SESSION['user']['id'];

    $stmt = $pdo->prepare("SELECT * FROM names WHERE id = :id");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['pass']) {
        $deleteStmt = $pdo->prepare("DELETE FROM names WHERE id = :id");
        $deleteStmt->bindParam(':id', $userId);
        $deleteStmt->execute();

        session_destroy();
    }
}