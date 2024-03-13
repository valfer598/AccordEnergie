<?php

class Commentaire
{
    private $prenom;
    private $message;
    private $conn;

    public function __construct($db_conn, $prenom = null, $message = null)
    {
        $this->conn = $db_conn;
        $this->prenom = $prenom;
        $this->message = $message;
    }

    public function commentaire(){
        $sql = "INSERT INTO Commentaire (prenom, message) 
                VALUES ('$this->prenom', '$this->message')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Commentaire envoyé!";
        }
        
    }

}