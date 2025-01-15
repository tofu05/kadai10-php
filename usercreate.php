<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style/login.css">

</head>
<body>
    <h1>ユーザー登録</h1>
    <form id="Form" class="form">
        <input type="text" id="name" placeholder="名前" required>
        <input type="text" id="pass" placeholder="パスワード" required>
        <button type="submit">登録</button>
    </form>
    <a href="login.php" class="bt">ログイン画面に戻る</a>
    <div class="view"></div>

    <script>
        $("#Form").on("submit", function (e) {
            e.preventDefault(); 
            const name = $("#name").val();
            const pass = $("#pass").val();

            $.post("server/create.php", { name: name, pass: pass }, function (response) {
                $(".view").html("<h2>登録完了</h2>");
            }).fail(function (xhr, status, error) {
                alert("エラーが発生しました。");
            });
        });
    </script>
</body>
</html>