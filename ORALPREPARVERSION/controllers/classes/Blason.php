<?php
require_once('controllers/classes/ConnexionBDD.php');
require_once('controllers/classes/Log.php');
//global $logFile;

class Blason {
    
    private $idBlas, $idUser, $nom, $taille, $photo;

	public function __construct($nom, $taille, $photo,$idUser) {
		

        $this->idUser = $idUser;
		$this->nom = $nom;
		$this->taille = $taille;
		$this->photo = $photo;
        
        
        //Inserer valeurs à la creation d une nouvelle instance
        $this->creerBlason();
        
        //Recuper l'id du blason
        $this->idBlas = $this->getBlasonID();
        //echo '<p>Objet Blason instancié</p>';

	}
    
    public function getBlasonID() {
        //Recuperer l'id pour pouvoir modifier ou supprimer le blason
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $requete = "SELECT ID_BLAS FROM blason WHERE ID_USER = ? AND NOMBLAS = ? AND TAILLEBLAS = ? AND PHOTOBLAS = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->idUser, $this->nom, $this->taille, $this->photo]);
        $result = $stmt->fetchColumn();
        
        return $result;
    }

	public function checkBlason() {
		// Verifier si le blason existe dans la DB
		// Verifier s'il y a une ligne ou plus avec les memes valeurs d'attributs
		// Si oui return false, true sinon
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $requete = "SELECT COUNT(ID_BLAS) FROM blason WHERE NOMBLAS = ? AND ID_USER = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->nom, $this->idUser]);
        $result = $stmt->fetchColumn();
        if($result == 0) {
            //echo '<p>Aucun blason de ce nom</p>';
            return false;
        } else {
            echo '<p>Ce blason existe deja</p>';
        }
        return true;
        
	}

	public function creerBlason() {
		        global $logFile;

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        if ($this->checkBlason() == false) {
            //Insérer données dans la DB
            $requete = "INSERT INTO blason (ID_USER, NOMBLAS, TAILLEBLAS, PHOTOBLAS) VALUES (:idUser, :nomBlas, :tailleBlas, :photoBlas)";

            $add = $con->prepare($requete);
            $add->bindParam(':idUser', $this->idUser);
            $add->bindParam(':nomBlas', $this->nom);
            $add->bindParam(':tailleBlas', $this->taille);
            $add->bindParam(':photoBlas', $this->photo);

            //Inserer la ligne
            $add->execute();
            
            //Inserer dans le fichier log l'action effectuée
            $log_message = "Nouveau blason crée par idUser: " . $this->idUser;

            $logFile->open();
            $logFile->write($log_message);
            $logFile->close();
            //echo "<p>Données insérées avec succes</p>";
        }
	}
    
    public function modifierBlason($attr) {
		 global $logFile;

        //modif:array de taille 3 tlq ["NOMBLAS" => valeur, "TAILLEBLAS" => valeur, "PHOTOBLAS" => valeur, etc]
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $blasID = $this->idBlas;
        
        foreach($attr as $key => $value) {
            if($value != NULL) {
                $requete = "UPDATE blason SET $key='$value' WHERE ID_BLAS ='$blasID'";
                //echo $requete . '</br>';
                $con->exec($requete);
            }
        }
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idBlas: " . $blasID ." modifié par idUser: " . $this->idUser;

        $logFile->open();
        $logFile->write($log_message);
        $logFile->close();
        //echo '<p>Valeur(s) modifiée(s)</p>';
    }

	public function supprimerBlason() {
		
		global $logFile;

		//Effacer données du blason
        //Valeur $id a prendre dans l'url
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $blasID = $this->idBlas;
        $requete = "DELETE FROM blason WHERE ID_BLAS = '$blasID'";
        
        $con->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idBlas: " . $blasID ." supprimé par idUser: " . $this->idUser;

        $logFile->open();
        $logFile->write($log_message);
        $logFile->close();
        //echo '<p>Blason supprimé</p>';
	}
}

//$nom = "Nom Blas";
//$nom2 = "Nom";
//$taille = 25;
//$photo = "photo blason";

//$attr = array("NOMBLAS" => "nouveau nom", "TAILLEBLAS" => NULL, "PHOTOBLAS" => "nouvelle photo");

//$blason = new Blason($nom, $taille, $photo);
//$blason->modifierBlason($attr);
//$blason2 = new Blason($nom2, $taille, $photo);
//$blason->supprimerBlason();
//$blason2->modifierBlason($attr);
//$blason2->supprimerBlason();
?>