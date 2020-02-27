<?php
include 'function.php';
include "header.php";
session_start();


if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['userconnect']);
    // $password = password_hash($_POST['passwordconnect'], PASSWORD_DEFAULT);
    $password = $_POST['passwordconnect'];

    if (!empty($username) and !empty($password)) {
        $requser = $pdo->prepare("SELECT * FROM test WHERE username = ? AND `password` = ?");
        $requser->execute(array($username, $password));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['username'] = $userinfo['username'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">

</head>

<id class="home">
    <div class="container-fluid">
        <div class="row">
            <form class="col-md-6 registration " method="POST">

                <p>Registration</p>
                <input class="username-registration " type="text" placeholder="username" required name="username">
                <input class="email-registration " type="email" placeholder="email" required name="email">
                <input class="password-registration " type="password" placeholder="password" required name="password">
                <input class="confirm-password-registration " type="password" placeholder="confirm your password" required name="confirm_password">

                <input class="clear" type="reset" value="clear" name="clear"></>
                <input class="submit" type="submit" name="submit" value="Connect">

            </form>



            <form class="col-md-6 login" method="POST">
                <p>login</p>
                <input class="username" type="text" name="userconnect">
                <input class="password" type="password" name="passwordconnect">
                <input class="submit" type="submit" name="submit" value="submit">

            </form>
        </div>
    </div>


</id>

</html>