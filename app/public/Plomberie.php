<?php
    session_start();

    try {
        $conn = new PDO('mysql:host=mysql;dbname=AccordEnergie', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        die();
    }
    
    $query = "SELECT nom, prenom FROM User WHERE role = 'Intervenant'";
    $query2 = "SELECT nom, prenom FROM User WHERE role = 'Client'";
    $result = $conn->query($query);
    $result2 = $conn->query($query2);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bouton"])) {
        $nom_intervenant = $_POST["nom_intervenant"];
        $nom_client = $_POST["nom_client"];
        $adresse = $_POST["adresse"];
        $date_intervention = $_POST["date_intervention"];
        $priorite = $_POST["priorite"];
    
        $sql = "INSERT INTO Intervention (nom_intervenant, nom_client, adresse, date, statut, priorite) 
                VALUES ('$nom_intervenant', '$nom_client', '$adresse', '$date_intervention', 'En attente', '$priorite')";
    
        try {
            $conn->exec($sql);
            header("Location: " . $_SERVER["PHP_SELF"]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données : " . $e->getMessage();
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AccordEnergie</title>
    <link rel="stylesheet" href="/css/Plomberie.css">
    <link rel="shortcut icon" href="/image/logo4.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <style>
        .intervention-bubble {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Section: Plomberie</h1>
        <h2><a href="missionStandardiste.php">X</a></h2>
    </header>

    <section id="creer" class="center-container">
        <div class="image-container">
            <img src="/image/croix.png" id="enfoncement-image" onclick="openLoginModal()">
        </div>
        <h2>Créer une nouvelle intervention</h2>
    </section>

    <div id="LoginModal" class="modal">
        <div class="login-modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Connexion Admin/Standardistes</h2>
            <form method="post" action="">
                <div id="Quitter"><a href="Plomberie.php">X</a></div>
                <select class="login-input" name="nom_intervenant">
                    <?php
                    $result_temp = $conn->query($query);
                    while ($row = $result_temp->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['nom'] . "'>" . $row['prenom'] . " " . $row['nom'] . "</option>";
                    }
                    ?>
                </select>
                <select class="login-input" name="nom_client">
                    <?php
                    while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['nom'] . "'>" . $row['prenom'] . " " . $row['nom'] . "</option>";
                    }
                    ?>
                </select>
                <input type="text" class="login-input" name="adresse" required>
                <input type="date" class="login-input" name="date_intervention" required>
                <select class="login-input" name="priorite">
                    <option value="Basse">Basse</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Haute">Haute</option>
                </select>
                <input type="submit" value="Ajouter" name="bouton" required>
            </form>
        </div>
    </div>

    <section id="existant" class="center-container">
        <?php
        $query3 = "SELECT * FROM Intervention ORDER BY date ASC"; 
        $result3 = $conn->query($query3);

        while ($row = $result3->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='intervention-bubble'>
                    <p><strong>Nom intervenant:</strong> " . $row['nom_intervenant'] . "</p>
                    <p><strong>Nom client:</strong> " . $row['nom_client'] . "</p>
                    <p><strong>Adresse:</strong> " . $row['adresse'] . "</p>
                    <p><strong>Date intervention:</strong> " . $row['date'] . "</p>
                    <p><strong>Statut:</strong> " . $row['statut'] . "</p>
                    <p><strong>Priorité:</strong> " . $row['priorite'] . "</p>
                    <div class='priority-dot'></div>
                </div>";
        }

        $conn = null;

        ?>
    </section>

    <script>
        function openLoginModal() {
            document.getElementById("LoginModal").style.display = "flex";
        }

        function closeLoginModal() {
            document.getElementById("LoginModal").style.display = "none";
        }
    </script>

</body>

</html>
