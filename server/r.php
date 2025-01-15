<?php
$pdo = new PDO("mysql:host=;dbname=;charset=utf8", "", "");

$name = $_POST['name'] ?? '';
$pass = $_POST['pass'] ?? '';

if ($name && $pass) {
    $stmt = $pdo->prepare("SELECT * FROM names WHERE name = :name AND pass = :pass");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        session_start();
        $_SESSION['user'] = $user;
        echo "success";
    } else {
        echo "ユーザー名またはパスワードが間違っています。";
    }
} else {
    echo "入力データが不正です。";
}
?>