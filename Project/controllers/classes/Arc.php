<?php

/**
 * Effectu la connexion a la base de donné pour permettre les transferts dans la classe.
 */
require_once('controllers/classes/ConnexionBDD.php');
//require_once('../controllers/classes/ConnexionBDD.php');
/**
 * Inclut le fichier log pour garder une trace des actions effectuées dans Arc.
 */
require_once('controllers/classes/Log.php');
//require_once('../controllers/classes/Log.php');

/**
 * Class Arc
 */
class Arc {

    /**
     * ID de l'arc générer par la base de données.
     * @var int
     */
    private $idArc;

    /**
     * ID de l'utilisateur a qui l'arc appartient.
     * @var int
     */
    private $idUser;

    /**
     * Nom de l'arc.
     * @var string
     */
    private $nom;

    /**
     * Poids de l'arc.
     * @var int
     */
    private $poids;

    /**
     * Taille de l'arc.
     * @var int
     */
    private $taille;

    /**
     * Puissance de l'arc.
     * @var int
     */
    private $puissance;

    /**
     * Type d'arc.
     * @var string
     */
    private $type;

    /**
     * Emplacement de la photo de l'arc.
     * @var string
     */
    private $photo;

    /**
     * Constructeur de la classe arc.
     * @param $nom
     * @param $poids
     * @param $taille
     * @param $puissance
     * @param $type
     * @param $photo
     */
	public function __construct($nom, $poids, $taille, $puissance, $type, $photo) {
        
        $this->idUser = $_SESSION['ID'];
		$this->nom = addslashes($nom);
        $this->poids = $poids;
        $this->taille = $taille;
        $this->puissance = $puissance;
		$this->type = addslashes($type);
		$this->photo = $photo;

        $this->creerArc();//Inserer valeurs à la creation d une nouvelle instance.

        $this->idArc = $this->getArcID(); //récupère l'id générer par la base de donné.
	}

    /**
     * Renvoie l'ID de l'arc.
     * Utile pour ensuite le recuperer dans la base de données.
     * @return mixed
     */
    public function getArcID() {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        //selectionne l'ID de l'arc dans la base de données.
        $requete = "SELECT ID_ARC FROM arc WHERE ID_USER = '$this->idUser' AND NOMARC = '$this->nom' AND POIDSARC = '$this->poids' AND TAILLEARC = '$this->taille' AND PWRARC = '$this->puissance' AND TYPEARC = '$this->type' AND PHOTOARC = '$this->photo'";
        $reponse = $con-> query($requete);
        $donne = $reponse->fetch();
        $idArc = $donne['ID_ARC'];
         return $idArc;
    }

    /**
     * Vérifie si les valeurs de arc sont valides.
     * Appeller avant d'envoyer les valeurs dans la base de données.
     * @return bool
     */
	public function checkArc() {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        //selectionne l'ID de l'arc dans la base de données.
        $requete = "SELECT ID_ARC FROM arc WHERE NOMARC = '$this->nom' AND ID_USER = '$this->idUser'";
        $stmt = $con->query($requete);
        $result = $stmt->rowCount();
        if($result == 0) {
            return false;
        } else {
            echo "<p> Cet arc existe deja</p>";
        }
        return true;
    }

    /**
     * Récupère ces valeurs et les envoies dans la base de données.
     * Utilise checkArc.
     */
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
            //$logFile->open();
            //$logFile->write($log_message);
            //<$logFile->close();
            echo "<p>Données insérées avec succes</p>";
        }
    }

    /**
     * Supprime l'arc de la base de données.
     */
	public function supprimerArc() {

        global $logFile;
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();
        
        $arcID = $this->getArcID();
        $requete = "DELETE FROM arc WHERE ID_ARC = '$arcID'";
        $con->exec($requete);
        
        //Inserer dans le fichier log l'action effectuée
        $log_message = "idArc: " . $arcID ." supprimé par idUser: " . $this->idUser;
        //$logFile->open();
        //$logFile->write($log_message);
        //$logFile->close();
	}
    
    public function __destruct(){

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