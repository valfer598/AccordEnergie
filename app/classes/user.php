<?php

class User
{
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $telephone;
    private $role;
    private $message;
    private $conn;

    public function __construct($db_conn, $nom = null, $prenom = null, $email = null, $mdp = null, $telephone = null, $role = "Client")
    {
        $this->conn = $db_conn;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->telephone = $telephone;
        $this->role = $role;
    }

    public function insertUser()
    {
        $sql = "INSERT INTO User (nom, prenom, email, mdp, telephone, role) 
                VALUES ('$this->nom', '$this->prenom', '$this->email', '$this->mdp', '$this->telephone', '$this->role')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Données insérées avec succès";
            header("Location: login.php");
        }
    }

    public function login($email, $mdp)
    {
        $this->email = trim($email);
        $this->mdp = $mdp;

        $requete = "SELECT nom, prenom, role, mdp, idu FROM User WHERE email = :email";
        $stmt = $this->conn->prepare($requete);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($this->mdp, $resultat["mdp"])) {
                $_SESSION["email"] = $this->email;
                $_SESSION["nom"] = $resultat["nom"];
                $_SESSION["prenom"] = $resultat["prenom"];
                $_SESSION["role"] = $resultat["role"];
                $_SESSION['idu'] = $resultat["idu"]; // Remplacez $idUtilisateur par l'ID réel de l'utilisateur

                switch ($_SESSION["role"]) {
                    case "admin":
                        header("Location: dashboard_admin.php");
                        break;
                    case "Standardiste":
                        header("Location: standardiste.php");
                        break;
                    case "Intervenant":
                        header("Location: intervenant.php");
                        break;
                    case "Client":
                        header("Location: pageProfil.php");
                        break;
                    default:
                        echo '<script>alert("Role non reconnu");</script>';
                        break;
                }
                exit();
            } else {
                echo '<script>alert("Mail ou mot de passe erroné");</script>';
            }
        } else {
        }
    }

    public function logout() {

        session_start(); 

    $_SESSION = array();

    if (session_destroy()) {
        header("Cache-Control: no-cache, no-store, must-revalidate"); 
        header("Pragma: no-cache"); 
        header("Expires: 0");

        header("Location: login.php");
        exit();
    } else {
        die("Erreur lors de la destruction de la session. session_status: " . session_status());
        
    }
    
    }

    public function getIntervention() {
        $nomClient = $_SESSION['nom'];
    
        $sql = "SELECT * FROM Intervention WHERE nom_client = :nomClient";
    
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':nomClient', $nomClient, PDO::PARAM_STR);
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function getAllIntervention() {
        $sql = "SELECT * FROM Intervention";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }    

    public function modifierIntervention($interventionId, $nomIntervenant, $date, $nomClient, $priorite, $statut) {

        $sql = "UPDATE interventions SET nom_intervenant=:nom_intervenant, date=:date, nom_client=:nom_client, priorite=:priorite, statut=:statut WHERE id=:id";
    
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':id', $interventionId, PDO::PARAM_INT);
        $stmt->bindParam(':nom_intervenant', $nomIntervenant, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':nom_client', $nomClient, PDO::PARAM_STR);
        $stmt->bindParam(':priorite', $priorite, PDO::PARAM_STR);
        $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
    
        $stmt->execute();
    
        return;
    }
    
    
            
}

