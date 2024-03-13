<?php
    require_once '../vendor/autoload.php';
    require_once '../classes/user.php';

    ini_set('session.cookie_lifetime', 0);

    $db_conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");

    $user = new User($db_conn);

    $user->logout();
?>
