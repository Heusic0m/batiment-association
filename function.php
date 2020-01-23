<?php

function openConnection()
{
    // Try to figure out what these should be for you
    $hostname = "remotemysql.com";
    $dbname = "RXe6HPUpGx";
    $username = "RXe6HPUpGx";
    $password = "kfMp1XQ155";

    // Try to understand what happens here
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // Why we do this here
    return $pdo;
}



/* 
 if (isset($_POST["username"])) {
        $username = $_POST["username"];
    }
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $bad_email = "Adresse email invalide";
    } else {
        $bad_email = "";
    }
    if (isset($_POST['password']))
        $password = $_POST["password"]; */
/* echo password_hash($password, PASSWORD_DEFAULT);  // Affiche le mot de passe crypté */

try {

    if (isset($_POST["submit"])) {

        $username = $_POST["username"];
        $email =  $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];



        $pdo = openConnection();

        if ($password === $confirm_password) {

            $sql = "INSERT INTO test (username, email, password) VALUES (?,?,?);";
            $result = $pdo->prepare($sql)->execute([$username, $email, $password]);
            echo "password ok";
            echo "Your information has been sent " . "<br>" . '<a href="form.php">Come back to home to log in</a>';
        } else {
            echo "confirmation not ok";
        }
    }
} catch (Exception  $e) {

    echo "Not ok";
}
