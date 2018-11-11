<?php
//include '../controller/functions/connexion_bdd.php';

//require('../controller/functions/control-session.php');
require_once('../controller/classes/Log.php');

global $idUser;

//Nouvelle instance globale de Log, puis ouvrir le fichier
//global $log_file;

//$log_file->open();

class Blason {
    
    private $idBlas;
    private $idUser;
	private $nom;
	private $taille;
	private $photo;
    
    //private $log_file;

	public function __construct($nom, $taille, $photo) {
        global $idUser;
        //global $log_file;
        include '../controller/functions/connexion_bdd.php';
        
        $this->idUser = 1/*$idUser*/;
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
        //global $bdd;
        include '../controller/functions/connexion_bdd.php';
        
        $requete = "SELECT ID_BLAS FROM blason WHERE ID_USER = ? AND NOMBLAS = ? AND TAILLEBLAS = ? AND PHOTOBLAS = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute([$this->idUser, $this->nom, $this->taille, $this->photo]);
        $result = $stmt->fetchColumn();
        
        return $result;
    }

	public function checkBlason() {
		// Verifier si le blason existe dans la DB
		// Verifier s'il y a une ligne ou plus avec les memes valeurs d'attributs
		// Si oui return false, true sinon
        //global $bdd;
        include '../controller/functions/connexion_bdd.php';
        
        $requete = "SELECT COUNT(ID_BLAS) FROM blason WHERE NOMBLAS = ? AND ID_USER = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute([$this->nom, $this->idUser]);
        $result = $stmt->fetchColumn();
        if($result == 0) {
            //echo '<p>Aucun blason de ce nom</p>';
            return false;
        } else {
            //echo '<p>Ce blason existe deja</p>';
        }
        return true;
        
	}

	public function creerBlason() {
        //global $bdd;
        include '../controller/functions/connexion_bdd.php';
        //global $log_file;
        
        if ($this->checkBlason() == false) {
            //Insérer données dans la DB
            $requete = "INSERT INTO blason (ID_USER, NOMBLAS, TAILLEBLAS, PHOTOBLAS) VALUES (:idUser, :nomBlas, :tailleBlas, :photoBlas)";

            $add = $bdd->prepare($requete);
            $add->bindParam(':idUser', $this->idUser);
            $add->bindParam(':nomBlas', $this->nom);
            $add->bindParam(':tailleBlas', $this->taille);
            $add->bindParam(':photoBlas', $this->photo);

            //Inserer la ligne
            $add->execute();
            
            //Inserer dans le fichier log l'action effectuée
            //$log_message = "Nouveau blason crée par idUser: " . $this->idUser;
            //$log_file->write($log_message);
            //echo "<p>Données insérées avec succes</p>";
        }
	}
    
    public function modifierBlason($attr) {
        //modif:array de taille 3 tlq ["NOMBLAS" => valeur, "TAILLEBLAS" => valeur, "PHOTOBLAS" => valeur, etc]
        //global $bdd;
        include '../controller/functions/connexion_bdd.php';
        //global $log_file;
        
        $blasID = $this->idBlas;
        
        foreach($attr as $key => $value) {
            if($value != NULL) {
                $requete = "UPDATE blason SET $key='$value' WHERE ID_BLAS ='$blasID'";
                //echo $requete . '</br>';
                $bdd->exec($requete);
            }
        }
        
        //Inserer dans le fichier log l'action effectuée
        //$log_message = "idBlas: " . $blasID ." modifié par idUser: " . $this->idUser;
        //$log_file->write($log_message);
        //echo '<p>Valeur(s) modifiée(s)</p>';
    }

	public function supprimerBlason() {
		//Effacer données du blason
        //Valeur $id a prendre dans l'url
        //global $bdd;
        include '../controller/functions/connexion_bdd.php';
        //global $log_file;
        
        $blasID = $this->idBlas;
        $requete = "DELETE FROM blason WHERE ID_BLAS = '$blasID'";
        
        $bdd->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        //$log_message = "idBlas: " . $blasID ." supprimé par idUser: " . $this->idUser;
        //$log_file->write($log_message);
        //echo '<p>Blason supprimé</p>';
	}

	public function getNom() {return $this->nom;}
    public function getTaille() {return $this->taille;}
    public function getPhoto() {return $this->photo;}

}

/*
$nom = "Nom Blas";
$nom2 = "Nom";
$taille = 25;
$photo = "photo blason";

$attr = array("NOMBLAS" => "nouveau nom", "TAILLEBLAS" => NULL, "PHOTOBLAS" => "nouvelle photo");

$blason = new Blason($nom, $taille, $photo);
$blason->modifierBlason($attr);
$blason2 = new Blason($nom2, $taille, $photo);
$blason->supprimerBlason();
$blason2->modifierBlason($attr);
$blason2->supprimerBlason();
*/

//$log_file->close();
?>