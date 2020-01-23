<?php
session_start();
if (isset($_POST['login'])) {
    $userconnect = htmlspecialchars($_POST['userconnect']);
    $passwordconnect = password_hash($_POST['passwordconnect'], PASSWORD_DEFAULT);
    if (!empty($userconnect) and !empty($passwordconnect)) {
        $requser = $pdo->prepare("SELECT * FROM test WHERE username = ? AND password = ?");
        $requser->execute(array($userconnect, $passwordconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['username'] = $userinfo['username'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: profil.php?id=" . $_SESSION['id']);
            echo "ok";
        } else {
            $erreur = "Mauvais mail ou mot de passe !";
            echo "bad mail";
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
</head>

<body>
    <div class="bloc">
        <form>
            <h1>login</h1>
            <input class="username" type="text" placeholder="username" required name="userconnect">
            <input class="password" type="password" placeholder="password" required name="current-password">
            <input class="submit" type="submit" name="login" value="Connect">

        </form>
        <div class="bloc2"></div>
    </div>
</body>

</html>