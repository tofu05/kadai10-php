<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <h1>ログイン</h1>
    <form id="loginForm" class="form">
        <input type="text" id="name" name="name" placeholder="ユーザー名" required>
        <input type="password" id="pass" name="pass" placeholder="パスワード" required>
        <button type="submit">ログイン</button>
    </form>
    <a href="usercreate.php" class="bt">ユーザー登録はこちら</a>
    <div id="view"></div>

    <script>
        $("#loginForm").on("submit", function (e) {
            e.preventDefault(); 
            const name = $("#name").val();
            const pass = $("#pass").val();

            $.post("server/r.php", { name: name, pass: pass }, function (response) {
                if (response === "success") {
                    window.location.href = "dashboard.php"; 
                } else {
                    $("#view").html("<p>ログイン失敗: " + response + "</p>");
                }
            }).fail(function () {
                $("#view").html("<p>エラーが発生しました。</p>");
            });
        });
    </script>
</body>
</html>