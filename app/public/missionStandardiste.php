<?php

    require_once '../vendor/autoload.php';
    
    use App\Page;

    session_start(); 

    $page = new Page();
    echo $page->render('missionStandardiste.html.twig',  []);




