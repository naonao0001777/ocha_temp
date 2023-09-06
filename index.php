<?php
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="ja" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>ocha</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index">Ocha</a>
            <div class="d-flex ms-auto">
                <form method="post" action="./view/login">
                    <div class="">
                        <button type="submit" class="btn btn-outline-secondary btn-sm mx-1" id="login" name="fromOhterToLogin">ログイン</button>
                        <input type="hidden" id="login" name="hiddenPage" value="index">
                    </div>
                </form>
                <form method="post" action="./view/register">
                    <div class="">
                        <button type="submit" class="btn btn-success btn-sm mx-1" id="register" name="register">新規登録</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="position-relative">
        <div class="position-absolute top-50 start-50 translate-middle-x">
            <h1>Ocha</h1>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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