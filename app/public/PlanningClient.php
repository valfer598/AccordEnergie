<?php
    use App\Page;
    require_once '../vendor/autoload.php';
    require_once '../classes/user.php';

    $db_conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");
    
    $page = new Page();
    $user = new User($db_conn);

    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }

    $clientId = $_SESSION['idu'];

    $clientInterventions = $user->getIntervention();
    
    echo $page->render('planningClient.html.twig', ['clientInterventions' => $clientInterventions]);
