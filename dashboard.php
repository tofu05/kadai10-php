<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ダッシュボード</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>こんにちは、<?= $_SESSION['user']['name'] ?>さん！</h1>

    <button id="deleteAccount">アカウント削除</button>
    <button id="changePassword">パスワード変更</button>
    <button id="logoutButton">ログアウト</button> 

    <div id="actionModal" style="display: none;">
        <input type="password" id="actionPassword" placeholder="パスワード">
        <button id="confirmAction">実行</button>
    </div>

    <iframe
        src="https://udify.app/chatbot/"
        style="width: 100%; height: 100%; min-height: 700px"
        frameborder="0"
        allow="microphone">
    </iframe>
    <script>
        let actionType = "";

        $("#deleteAccount").on("click", function () {
            actionType = "delete";
            $("#actionModal").show();
        });

        $("#changePassword").on("click", function () {
            actionType = "change";
            $("#actionModal").show();
        });

        $("#confirmAction").on("click", function () {
            const password = $("#actionPassword").val();

            if (actionType === "delete") {
                $.post("server/d.php", { password: password });
            } else if (actionType === "change") {
                $.post("server/change_pass.php", { password: password });
            }
        });

        $("#logoutButton").on("click", function () {
            $.post("server/lo.php", function () {
                window.location.href = "login.php"; 
            });
        });
    </script>
</body>
</html>