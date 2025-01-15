<?php
session_start();
if (!isset($_SESSION['user'])) {
    exit;
}

$pdo = new PDO("mysql:host=;dbname=;charset=utf8", "", "");

$newPassword = $_POST['password'] ?? '';

if ($newPassword) {
    $stmt = $pdo->prepare("UPDATE names SET pass = :pass WHERE id = :id");
    $stmt->bindParam(':pass', $newPassword);
    $stmt->bindParam(':id', $_SESSION['user']['id']);
    $stmt->execute();
}