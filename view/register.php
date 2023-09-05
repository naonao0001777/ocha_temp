<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>register</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index">Ocha</a>
            <div class="d-flex ms-auto">
                <form method="post" action="./login">
                    <div class="">
                        <button type="submit" class="btn btn-outline-secondary btn-sm mx-1" name="loginNav" id="loginNav">ログイン</button>
                    </div>
                </form>
                <form method="post" action="./register">
                    <div class="">
                        <button type="submit" class="btn btn-success btn-sm mx-1" name="registerNav" id="registerNav">新規登録</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-sm">
        <div class="row justify-content-md-center">
            <div class="col-4 border border-success-subtle">
                <h4 class="text-center">Ochaアカウントを作成</h4>
                <form method="post" action="../routes/route.php" name="register" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <lavel for="userId" class="form-lavel text-start">ユーザーID</lavel>
                        <input type="text" class="form-control" id="userId" name="userId" maxlength="100" pattern="[a-zA-Z0-9\-]+" placeholder="半角英数字のみ" required>
                    </div>
                    <!-- <div class="invalid-feedback">
                        Looks good!
                    </div> -->
                    <div class="mb-3">
                        <label for="userMail" class="form-label text-start">メールアドレス</label>
                        <input type="email" class="form-control" id="userMail" name="userMail" placeholder="@を含むメールアドレス" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label text-start">パスワード</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword" maxlength="100" minlength="5" placeholder="5文字以上" required>
                    </div>
                    <!-- <div class="invalid-feedback">
                        5文字以上で入力してください
                    </div> -->
                    <div class="row">
                        <label for="message" class="form-label text-center"><?php echo $_SESSION['msg']; ?></label>
                    </div>
                    <div class="row">
                        <div class="col d-grid gap-2 col-6 mx-auto text-center">
                            <button type="submit" class="btn btn-success" name="register" value="register">登録</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<?php session_destroy(); ?>