<?php
    use App\Page;
    require_once '../vendor/autoload.php';
    require_once '../classes/user.php';

    $db_conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");

    session_start();

    $page = new Page;
    echo $page->render('register.html.twig', []);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); 
        $telephone = htmlspecialchars($_POST['telephone']);
        $role = $_POST["role"];
 

        $user = new User($db_conn, $nom, $prenom, $email, $mdp, $telephone, $role);

        $user->insertUser();

    } else {
    }
?>
