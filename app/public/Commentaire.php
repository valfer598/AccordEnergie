<?php
    use App\Page;
    require_once '../vendor/autoload.php';
    require_once '../classes/commentaire.php';

    $db_conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prenom = $_SESSION['prenom'];
        $message = $_POST['message']; 

        if (!empty($message)) {
            $Commentaire = new Commentaire($db_conn, $prenom, $message);
            $Commentaire->commentaire();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    $page = new Page;

    $sqlSelect = "SELECT * FROM Commentaire";
    $stmtSelect = $db_conn->prepare($sqlSelect);
    $stmtSelect->execute();
    $commentaireInterventions = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

    echo $page->render('commentaire.html.twig', ['commentaireInterventions' => $commentaireInterventions]);
?>
