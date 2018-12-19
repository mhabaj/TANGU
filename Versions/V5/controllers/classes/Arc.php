<?php
require_once('controllers/classes/ConnexionBDD.php');
require_once('controllers/classes/Log.php');
//global $logFile;
//$logFile->open();
class Arc {
    private $idArc, $idUser, $nom, $poids, $taille, $puissance, $type, $photo;
	public function __construct($nom, $poids, $taille, $puissance, $type, $photo) {
        
        $this->idUser = 1 /*$_SESSION['ID']*/;
		$this->nom = addslashes($nom);
        $this->poids = $poids;
        $this->taille = $taille;
        $this->puissance = $puissance;
		$this->type = addslashes($type);
		$this->photo = $photo;
        
        //Inserer valeurs à la creation d une nouvelle instance
        $this->creerArc();
        
        //Recuperer l'id de l'arc
        $this->idArc = $this->getArcID();
        //echo '<p>Objet Arc instancié</p>' ;
	}
    
    public function getArcID() {
        //Recuperer l'id de l'arc pour pouvoir le modifier ou le supprimer
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
		
		  $requete = "SELECT ID_ARC FROM arc WHERE ID_USER = '$this->idUser' AND NOMARC = '$this->nom' AND POIDSARC = '$this->poids' AND TAILLEARC = '$this->taille' AND PWRARC = '$this->puissance' AND TYPEARC = '$this->type' AND PHOTOARC = '$this->photo'";
        $reponse = $con-> query($requete);
        //while($donne = $reponse->fetch()) {
            $donne = $reponse->fetch();
            $idArc = $donne['ID_ARC'];
        //}
         return $idArc;
    }
	public function checkArc() {
		// Verifier si l'arc existe dans la DB
		// Verifier s'il y a une ligne ou plus avec les memes valeurs d'attributs
		// Si oui return false, true sinon
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
		
		  $requete = "SELECT ID_ARC FROM arc WHERE NOMARC = '$this->nom' AND ID_USER = '$this->idUser'";
        $stmt = $con -> query($requete);
        $result = $stmt->rowCount();
        if($result == 0) {
            //echo '<p>Aucun arc de ce nom</p>';
            return false;
        } else {
            echo "<p> Cet arc existe deja</p>";
        }
        return true;
    }
	public function creerArc() {
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        global $logFile;
        
        if ($this->checkArc() == false) {
            //Insérer données dans la DB
            $requete = "INSERT INTO arc (ID_USER, NOMARC, POIDSARC, TAILLEARC, PWRARC, TYPEARC, PHOTOARC) VALUES (:idUser, :nomArc, :poidsArc, :tailleArc, :pwrArc, :typeArc, :photoArc)";
            $add = $con->prepare($requete);
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
            $logFile->open();
            $logFile->write($log_message);
            $logFile->close();
            //showMessage('Arc crée avec succès !', 'succes');
            echo "<p>Données insérées avec succes</p>";
        }
    }
    
    public function modifierArc($attr) {
        //modif:array de taille 6 tlq ["NOMARC" => valeur, "POIDSARC" => valeur, "TAILLEARC" => valeur, etc]
        global $logFile;
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $arcID = $this->idArc;
        
        foreach($attr as $key => $value) {
            if($value != NULL) {
                $requete = "UPDATE arc SET $key='$value' WHERE ID_ARC= '$arcID'";
                //echo $requete . '</br>';
                $con->exec($requete);
            }
        }
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idArc: " . $arcID ." modifié par idUser: " . $this->idUser;
        $logFile->open();
        $logFile->write($log_message);
        $logFile->close();
        //echo '<p>Valeur(s) modifiée(s)</p>';
    }
	public function supprimerArc() {
		//Effacer données de l'arc
        //Valeur $id a prendre dans l'url
        global $logFile;
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $arcID = $this->getArcID();
        $requete = "DELETE FROM arc WHERE ID_ARC = '$arcID'";
        $con->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idArc: " . $arcID ." supprimé par idUser: " . $this->idUser;
        $logFile->open();
        $logFile->write($log_message);
        //echo '<p>Arc supprimé</p>';
        $logFile->close();
	}
    
    public function __destruct(){
        ;
    }
}
//$nom = "Nom Arc";
//$nom2 = "Nol";
//$poids = 25;
//$taille = 25;
//$pwr = 12;
//$type = "Cool";
//$photo = "photo";
//$attr = array("NOMARC" => "nom", "POIDSARC" => 17, "TAILLEARC" => NULL, "PWRARC" => NULL, "TYPEARC" => "poius", "PHOTOARC" => NULL);
//$arc = new Arc($nom, $poids, $taille, $pwr, $type, $photo);
//$arc->modifierArc($attr);
//$arc2 = new Arc($nom2, $poids, $taille, $pwr, $type, $photo);
//$arc->supprimerArc();
//$arc2->modifierArc($attr);
//$arc2->supprimerArc();
?>