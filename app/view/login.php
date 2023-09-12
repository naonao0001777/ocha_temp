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
            <a class="navbar-brand" href="../index">Ocha<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #b2f202
                        }
                    </style>
                    <path d="M272 96c-78.6 0-145.1 51.5-167.7 122.5c33.6-17 71.5-26.5 111.7-26.5h88c8.8 0 16 7.2 16 16s-7.2 16-16 16H288 216s0 0 0 0c-16.6 0-32.7 1.9-48.2 5.4c-25.9 5.9-50 16.4-71.4 30.7c0 0 0 0 0 0C38.3 298.8 0 364.9 0 440v16c0 13.3 10.7 24 24 24s24-10.7 24-24V440c0-48.7 20.7-92.5 53.8-123.2C121.6 392.3 190.3 448 272 448l1 0c132.1-.7 239-130.9 239-291.4c0-42.6-7.5-83.1-21.1-119.6c-2.6-6.9-12.7-6.6-16.2-.1C455.9 72.1 418.7 96 376 96L272 96z" />
                </svg></a>
            <div class="d-flex ms-auto">
                <form method="post" action="./login">
                    <div class="">
                        <button type="submit" class="btn btn-outline-secondary btn-sm mx-1" name="login" id="login">Sign in</button>
                    </div>
                </form>
                <form method="post" action="./register">
                    <div class="">
                        <button type="submit" class="btn btn-success btn-sm mx-1" name="register" id="register">Sign up</button>
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
                <h4 class="text-center">サインイン<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #b2f202
                            }
                        </style>
                        <path d="M272 96c-78.6 0-145.1 51.5-167.7 122.5c33.6-17 71.5-26.5 111.7-26.5h88c8.8 0 16 7.2 16 16s-7.2 16-16 16H288 216s0 0 0 0c-16.6 0-32.7 1.9-48.2 5.4c-25.9 5.9-50 16.4-71.4 30.7c0 0 0 0 0 0C38.3 298.8 0 364.9 0 440v16c0 13.3 10.7 24 24 24s24-10.7 24-24V440c0-48.7 20.7-92.5 53.8-123.2C121.6 392.3 190.3 448 272 448l1 0c132.1-.7 239-130.9 239-291.4c0-42.6-7.5-83.1-21.1-119.6c-2.6-6.9-12.7-6.6-16.2-.1C455.9 72.1 418.7 96 376 96L272 96z" />
                    </svg></h4>
                <form method="post" action="../routes/route.php" name="login">
                    <div class="mb-3">
                        <lavel for="userId" class="form-lavel text-start">id</lavel>
                        <input type="text" class="form-control" id="userId" name="userId" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label text-start">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                    </div>
                    <div class="row">
                        <label for="message" class="form-label text-center"><?php echo $_SESSION['msg']; ?></label>
                    </div>
                    <div class="mb-3">
                        <div class="col d-grid gap-2 col-6 mx-auto text-center">
                            <button type="submit" class="btn btn-success" name="login" value="login">Sign in</button>
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
