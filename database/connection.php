<?php
define('DATABASE_CONNECTION', 'mysql:host=localhost; dbname=ocha; charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');

class DatabaseConnection
{
    public static function Connection()
    {
        try {
            $dbh = new PDO(DATABASE_CONNECTION, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            $msg = $e->getMessage();
        }
        return $dbh;
    }

    public static function insertUser($dbh, $userId, $userMail, $userPassword)
    {
        $sql = DatabaseStatement::INSERT_USER_USERS;
        $stmt = $dbh->prepare($sql);
        $stmt->bindvalue(':userId', $userId);
        $stmt->bindvalue(':userMail', $userMail);
        $stmt->bindvalue(':userPassword', $userPassword);
        $stmt->execute();
        return $stmt;
    }
}
