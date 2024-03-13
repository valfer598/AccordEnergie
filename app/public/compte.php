<?php
    require_once '../vendor/autoload.php';
    
    use App\Page;

    session_start();

    $page = new Page();
    echo $page->render('compte.html.twig',  ['name' => $_SESSION['nom']." ".$_SESSION['prenom']]);
