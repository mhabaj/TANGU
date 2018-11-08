<?php
include '../includes/connexion_bdd.php';

require('../includes/control-session.php');
require_once('Log.php');


global $bdd;
global $idUser;

//Nouvelle instance globale de Log, puis ouvrir le fichier
global $log_file;

$log_file->open();

class Arc {
    
    private $idArc;
    private $idUser;
	private $nom;
    private $poids;
    private $taille;
    private $puissance;
	private $type;
	private $photo;
    
    //private $log_file;

	public function __construct($nom, $poids, $taille, $puissance, $type, $photo) {
        global $idUser;
        global $log_file;
        
        $this->idUser = $idUser;
		$this->nom = $nom;
        $this->poids = $poids;
        $this->taille = $taille;
        $this->puissance = $puissance;
		$this->type = $type;
		$this->photo = $photo;
        
        //Inserer valeurs à la creation d une nouvelle instance
        $this->creerArc();
        
        //Recuperer l'id de l'arc
        $this->idArc = $this->getArcID();
        //echo '<p>Objet Arc instancié</p>' ;
	}
    
    public function getArcID() {
        //Recuperer l'id de l'arc pour pouvoir le modifier ou le supprimer
        global $bdd;
        
        $requete = "SELECT ID_ARC FROM arc WHERE ID_USER = ? AND NOMARC = ? AND POIDSARC = ? AND TAILLEARC = ? AND TYPEARC = ? AND PHOTOARC = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute([$this->idUser, $this->nom, $this->poids, $this->taille, $this->type, $this->photo]);
        $result = $stmt->fetchColumn();
        
        return $result;
    }

	public function checkArc() {
		// Verifier si l'arc existe dans la DB
		// Verifier s'il y a une ligne ou plus avec les memes valeurs d'attributs
		// Si oui return false, true sinon
        global $bdd;
        
        $requete = "SELECT COUNT(ID_ARC) FROM arc WHERE NOMARC = ? AND ID_USER = ?";
        $stmt = $bdd->prepare($requete);
        $stmt->execute([$this->nom, $this->idUser]);
        $result = $stmt->fetchColumn();
        if($result == 0) {
            //echo '<p>Aucun arc de ce nom</p>';
            return false;
        } else {
            echo "<p> Cet arc existe deja</p>";
        }
        return true;
    }

	public function creerArc() {
        global $bdd;
        global $log_file;
        
        if ($this->checkArc() == false) {
            //Insérer données dans la DB
            $requete = "INSERT INTO arc (ID_USER, NOMARC, POIDSARC, TAILLEARC, PWRARC, TYPEARC, PHOTOARC) VALUES (:idUser, :nomArc, :poidsArc, :tailleArc, :pwrArc, :typeArc, :photoArc)";

            $add = $bdd->prepare($requete);
            $add->bindParam(':idUser', $this->idUser);
            $add->bindParam(':nomArc', $this->nom);
            $add->bindParam(':poidsArc', $this->poids);
            $add->bindParam(':tailleArc', $this->taille);
            $add->bindParam(':pwrArc', $this->puissance);
            $add->bindParam('typeArc', $this->type);
            $add->bindParam('photoArc', $this->photo);

            //Inserer la ligne
            $add->execute();
            
            //Inserer dans le fichier log l'action effectuée
            $log_message = "Nouvel arc crée par idUser: " . $this->idUser;
            $log_file->write($log_message);
            //showMessage('Arc crée avec succès !', 'succes');
            echo "<p>Données insérées avec succes</p>";
        }
    }
    
    public function modifierArc($attr) {
        //modif:array de taille 6 tlq ["NOMARC" => valeur, "POIDSARC" => valeur, "TAILLEARC" => valeur, etc]
        global $bdd;
        global $log_file;
        
        $arcID = $this->idArc;
        
        foreach($attr as $key => $value) {
            if($value != NULL) {
                $requete = "UPDATE arc SET $key='$value' WHERE ID_ARC= '$arcID'";
                //echo $requete . '</br>';
                $bdd->exec($requete);
            }
        }
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idArc: " . $arcID ." modifié par idUser: " . $this->idUser;
        $log_file->write($log_message);
        //echo '<p>Valeur(s) modifiée(s)</p>';
    }

	public function supprimerArc() {
		//Effacer données de l'arc
        //Valeur $id a prendre dans l'url
        global $bdd;
        global $log_file;
        
        $arcID = $this->idArc();
        $requete = "DELETE FROM arc WHERE ID_ARC = '$arcID'";

        $bdd->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idArc: " . $arcID ." supprimé par idUser: " . $this->idUser;
        $log_file->write($log_message);
        //echo '<p>Arc supprimé</p>';
	}
    
    public function __destruct(){
        ;
    }
}

$nom = "Nom Arc";
$nom2 = "Nol";
$poids = 25;
$taille = 25;
$pwr = 12;
$type = "Cool";
$photo = "photo";

//$attr = array("NOMARC" => "nom", "POIDSARC" => 17, "TAILLEARC" => NULL, "PWRARC" => NULL, "TYPEARC" => "poius", "PHOTOARC" => NULL);

//$arc = new Arc($nom, $poids, $taille, $pwr, $type, $photo);
//$arc->modifierArc($attr);
//$arc2 = new Arc($nom2, $poids, $taille, $pwr, $type, $photo);
//$arc->supprimerArc();
//$arc2->modifierArc($attr);
//$arc2->supprimerArc();


$log_file->close();
?>