<?php
include '../includes/connexion_bdd.php';

require('../includes/control-session.php');
require_once('Log.php');

global $bdd;
global $idUser;

//Nouvelle instance globale de Log, puis ouvrir le fichier
global $log_file;

$log_file->open();

/**
 * Class Blason
 */
class Blason {

    /**
     * ID du blason générer par la base de données.
     * @var mixed
     */
    private $idBlas;

    /**
     * ID de l'utilisateur a qui l'arc appartient.
     * @var
     */
    private $idUser;

    /**
     * Nom de blason.
     * @var
     */
    private $nom;

    /**
     * Taille du blason.
     * @var
     */
    private $taille;

    /**
     * Emplacement de la photo du blason.
     * @var
     */
    private $photo;
    
    //private $log_file;

    /**
     * Blason constructor.
     * @param $nom
     * @param $taille
     * @param $photo
     */
    public function __construct($nom, $taille, $photo) {
        global $idUser;
        global $log_file;
        
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

    /**
     * Renvoie l'ID du blason.
     * @return mixed
     */
    public function getBlasonID() {
        //Recuperer l'id pour pouvoir modifier ou supprimer le blason
        global $bdd;
        
        $requete = "SELECT ID_BLAS FROM blason WHERE ID_USER = ? AND NOMBLAS = ? AND TAILLEBLAS = ? AND PHOTOBLAS = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute([$this->idUser, $this->nom, $this->taille, $this->photo]);
        $result = $stmt->fetchColumn();
        
        return $result;
    }

    /**
     * Vérifie si les valeurs du blason sont valides.
     * @return bool
     */
    public function checkBlason() {
		// Verifier si le blason existe dans la DB
		// Verifier s'il y a une ligne ou plus avec les memes valeurs d'attributs
		// Si oui return false, true sinon
        global $bdd;
        
        $requete = "SELECT COUNT(ID_BLAS) FROM blason WHERE NOMBLAS = ? AND ID_USER = ?";
        $stmt = $bdd->prepare($requete);
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

    /**
     * Vérifie les valeurs du blason.
     * Récupère ces valeurs et les envoies dans la base de données.
     */
    public function creerBlason() {
        global $bdd;
        global $log_file;
        
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
            $log_message = "Nouveau blason crée par idUser: " . $this->idUser;
            $log_file->write($log_message);
            //echo "<p>Données insérées avec succes</p>";
        }
	}

    /**
     * Modifie les valeurs du blason dans la base.
     * @param $attr
     */
    public function modifierBlason($attr) {
        //modif:array de taille 3 tlq ["NOMBLAS" => valeur, "TAILLEBLAS" => valeur, "PHOTOBLAS" => valeur, etc]
        global $bdd;
        global $log_file;
        
        $blasID = $this->idBlas;
        
        foreach($attr as $key => $value) {
            if($value != NULL) {
                $requete = "UPDATE blason SET $key='$value' WHERE ID_BLAS ='$blasID'";
                //echo $requete . '</br>';
                $bdd->exec($requete);
            }
        }
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idBlas: " . $blasID ." modifié par idUser: " . $this->idUser;
        $log_file->write($log_message);
        //echo '<p>Valeur(s) modifiée(s)</p>';
    }

    /**
     * Supprime le blason de la base de données.
     */
    public function supprimerBlason() {
		//Effacer données du blason
        //Valeur $id a prendre dans l'url
        global $bdd;
        global $log_file;
        
        $blasID = $this->idBlas;
        $requete = "DELETE FROM blason WHERE ID_BLAS = '$blasID'";
        
        $bdd->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idBlas: " . $blasID ." supprimé par idUser: " . $this->idUser;
        $log_file->write($log_message);
        //echo '<p>Blason supprimé</p>';
	}
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

$log_file->close();
?>