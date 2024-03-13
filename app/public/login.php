<?php
    use App\Page;
    require_once '../vendor/autoload.php';
    require_once '../classes/user.php';

    session_start();

    $db_conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");

    $page = new Page;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = htmlspecialchars($_POST['email']);
        $mdp = $_POST['password']; 

        $user = new User($db_conn);

        $user->login($mail, $mdp);
    }

    echo $page->render('login.html.twig', []); 
?>
