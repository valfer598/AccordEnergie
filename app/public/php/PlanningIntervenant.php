<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AccordEnergie </title>
    <link rel="stylesheet" href="/css/Planning.css">
    <link rel="shortcut icon" href="/image/logo4.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>

<body>

    <figure class="logo">
        <img src="/image/logo4.png" alt="logo">
    </figure>

    <figure class="reglage">
        <a href="Reglage.php">
            <img src="/image/reglage.png">
        </a>
    </figure>

    <header class="Menu">
        <div class="barre_menu">
            <ul>
                <li><a href="Intervenant.php">Accueil</a></li>
                <div class="dropdown">
                    <li class="mainmenubtn"><a href="#">Intervention</a>
                        <div class="dropdown-child">
                            <a href="Mission.php">Missions</a>
                            <a href="Commentaire.php">Commentaire</a>
                        </div>
                    </li>
                </div>
                
                <div class="dropdown">
                    <li class="mainmenubtn"><a href="Contact.php">Contact</a>
                        <div class="dropdown-child">
                            <a href="Aide.php">Aide</a>
                            <a href="Recrutement.php">Recrutement</a>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </header>

    <div>
        <h1>Planning</h1>
    </div>
        
    <table>
        <th colspan="14">Janvier</th>
        <tbody>
            <tr class="Jour">
                <td colspan="2">1</td>
                <td colspan="2">2</td>
                <td colspan="2">3</td>
                <td colspan="2">4</td>
                <td colspan="2">5</td>
                <td colspan="2">6</td>
                <td colspan="2">7</td>
            </tr>
            <tr class="Case_vide">
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr class="Jour">
                <td colspan="2">8</td>
                <td colspan="2">9</td>
                <td colspan="2">10</td>
                <td colspan="2">11</td>
                <td colspan="2">12</td>
                <td colspan="2">13</td>
                <td colspan="2">14</td>
            </tr>
            <tr class="Case_vide">
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr class="Jour">
                <td colspan="2">15</td>
                <td colspan="2">16</td>
                <td colspan="2">17</td>
                <td colspan="2">18</td>
                <td colspan="2">19</td>
                <td colspan="2">20</td>
                <td colspan="2">21</td>
            </tr>
            <tr class="Case_vide">
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr class="Jour">
                <td colspan="2">22</td>
                <td colspan="2">23</td>
                <td colspan="2">24</td>
                <td colspan="2">25</td>
                <td colspan="2">26</td>
                <td colspan="2">27</td>
                <td colspan="2">28</td>
            </tr>
            <tr class="Case_vide">
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr class="Jour">
                <td colspan="2">29</td>
                <td colspan="2">30</td>
                <td colspan="2">31</td>
            </tr>
            <tr class="Case_vide">
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            
        </tbody>
    </table>

</body>
</html>