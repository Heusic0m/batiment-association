<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
function openConnection()
{
    // Try to figure out what these should be for you
    $hostname = "remotemysql.com";
    $dbname = "RXe6HPUpGx";
    $username = "RXe6HPUpGx";
    $password = "kfMp1XQ155";

    // Try to understand what happens here

    $pdo = new PDO('mysql:host=$hostname;port=3306;dbname=RXe6HPUpGx;charset=utf8', $username, $password);


    // Why we do this here
    return $pdo;
}
try {
    /*openConnection();*/
    echo "Ca marche!";
} catch (Exception $e) {
    echo $e->getMessage();
}
