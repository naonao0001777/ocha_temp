<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../resource/css/style.css">
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index">Ocha</a>
        </div>
    </nav>
    <div class="container text-center">
        <?php
        // プロフィール画面表示処理
        require_once('../database/statement.php');
        require_once('../database/connection.php');
        require_once('../config/config.php');
        require_once('../config/session.php');
        require_once('../config/message.php');

        $requestUri = $_SERVER['REQUEST_URI'];
        $startSubInt = strpos($requestUri, 'u/');
        $userId = substr($requestUri, $startSubInt + 2);

        $dbh = DatabaseConnection::Connection();

        try {
            $sql = DatabaseStatement::SELECT_USER_ID;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':userId', $userId);
            $stmt->execute();
            $fetchedUser = $stmt->fetch();

            $profileImage = $fetchedUser['profile_image'];

            $sql = DatabaseStatement::SELECT_USER_LINKS;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':userId', $userId);
            $stmt->execute();
            $fetchedUser = $stmt->fetch();

            if ($fetchedUser) {
                echo '<div class="row justify-content-md-center g-2">';
                echo '<div class="col"></div>';
                echo '<div class="col">';
                echo '<img src="';
                echo config::USER_DIRECTORY_PATH . $fetchedUser['user_id'] . '/' . $profileImage;
                echo '" class="img-thumbnail rounded-circle" width="100px" height="100px" alt="profile">';
                echo '</div>';
                echo '<div class="col"></div>';
                echo '</div>';
                echo '<h3>@';
                echo $fetchedUser['user_id'];
                echo '</h3>';
                echo '<div class="row justify-content-md-center">';

                for ($countColumn = 1; $countColumna <= (int)config::MAX_LINK; $countColumn++) {
                    $titleColumn = "title";
                    $urlColumn = "url";
                    $titleColumn = $titleColumn . (string)$countColumn;
                    $urlColumn = $urlColumn . (string)$countColumn;

                    $arrayTitleColumn[$titleColumn <= $fetchedUser[$titleColumn]];
                    $arrayTitleColumn[$urlColumn <= $fetchedUser[$urlColumn]];

                    if (isset($fetchedUser[$titleColumn])) {
                        echo '<div class = "row justify-content-md-center g-2">';
                        echo '<div class="col"></div>';
                        echo '<div class="col-6 d-grid gap-2">';
                        echo '<a href="';
                        echo $fetchedUser[$urlColumn];
                        echo '" class="';
                        echo 'btn btn-success btn-lg">';
                        echo $fetchedUser[$titleColumn];
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="col"></div>';
                        echo '</div>';
                    } else {
                        $_SESSION[$countColumn] = (int)$countColumn - 1;

                        $_SESSION[$titleColumn] = $arrayTitleColumn[$titleColumn <= $fetchedUser[$titleColumn]];
                        $_SESSION[$urlColumn] = $arrayTitleColumn[$urlColumn <= $fetchedUser[$urlColumn]];
                        break;
                    }
                }
            } else {
                header("HTTP/1.1 404 Not Found");
                exit;
            }
        } catch (PDOException $e) {
            $msg = $e->getMessage();
            $_SESSION['msg'] = $msg;
            header('Location: ../index');
        }
        ?>
    </div>
</body>

</html>