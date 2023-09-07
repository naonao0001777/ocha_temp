<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../resource/css/style.css">
    <title>login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index">Ocha</a>
            <div class="d-flex ms-auto">
                <form method="post" action="./login">
                    <div class="">
                        <button type="submit" class="btn btn-outline-secondary btn-sm mx-1" name="login" id="login">ログイン</button>
                    </div>
                </form>
                <form method="post" action="./register">
                    <div class="">
                        <button type="submit" class="btn btn-success btn-sm mx-1" name="register" id="register">新規登録</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <?php
    // CSRF対策にトークンを生成
    $token = bin2hex(random_bytes(32));
    $_SESSION["token"] = $token;
    ?>
    <div class="container-sm">
        <div class="row justify-content-md-center">
            <div class="col-4 border border-success-subtle">
                <h4 class="text-center">ログイン</h4>
                <form method="post" action="../routes/route.php" name="login">
                    <div class="mb-3">
                        <lavel for="userId" class="form-lavel text-start">ユーザーID</lavel>
                        <input type="text" class="form-control" id="userId" name="userId" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label text-start">パスワード</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                    </div>
                    <div class="row">
                        <label for="message" class="form-label text-center"><?php echo $_SESSION['msg']; ?></label>
                    </div>
                    <div class="mb-3">
                        <div class="col d-grid gap-2 col-6 mx-auto text-center">
                            <button type="submit" class="btn btn-success" name="login" value="login">ログイン</button>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token']) ?>"></input>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_destroy();
