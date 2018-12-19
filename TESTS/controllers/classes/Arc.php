<?php



    require_once('../controllers/classes/ConnexionBDD.php');




/**
 * Elle permet de creer et supprimer des arcs.
 */
class Arc
{

    /**
     * ID de l'arc générer par la base de données.
     * @var int
     */
    private $bowID;

    /**
     * ID de l'utilisateur a qui l'arc appartient.
     * @var int
     */
    private $userID;

    /**
     * Nom de l'arc.
     * @var string
     */
    private $name;

    /**
     * Poids de l'arc.
     * @var int
     */
    private $weight;

    /**
     * Taille de l'arc.
     * @var int
     */
    private $size;

    /**
     * Puissance de l'arc.
     * @var int
     */
    private $power;

    /**
     * Type d'arc.
     * @var string
     */
    private $type;

    /**
     * Commentaires de l'arc
     * @var string
     */
    private $commArc;

    /**
     * Emplacement de la photo de l'arc.
     * @var string
     */
    private $picture;

    /**
     * Constructeur de la classe arc.
     * @param $name
     * @param $weight
     * @param $size
     * @param $power
     * @param $type
     * @param $commArc
     * @param $picture
     */

    public function __construct($name, $weight, $size, $power, $type, $commArc, $picture)
    {

        $userID = 1;
        $this->userID = $userID;
        $this->name = addslashes($name);
        $this->weight = $weight;
        $this->size = $size;
        $this->power = $power;
        $this->type = addslashes($type);
        $this->commArc = $commArc;
        $this->picture = $picture;

        $this->creerArc();

        $this->bowID = $this->getArcID();
    }




    /**
     * Renvoie l'ID de l'arc.
     * Utile pour ensuite le recuperer dans la base de données.
     * @return mixed
     */
    public function getArcID()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $requete = "SELECT ID_ARC FROM arc WHERE ID_USER = '$this->userID' AND NOMARC = '$this->name' AND POIDSARC = '$this->weight' AND TAILLEARC = '$this->size' AND PWRARC = '$this->power' AND TYPEARC = '$this->type' AND PHOTOARC = '$this->picture'";
        $reponse = $con->query($requete);
        $donne = $reponse->fetch();
        $idArc = $donne['ID_ARC'];
        return $idArc;
    }

    /**
     * Vérifie si les valeurs de arc sont valides.
     * Appeller avant d'envoyer les valeurs dans la base de données.
     * @return bool
     */
    public function checkArc()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $requete = "SELECT ID_ARC FROM arc WHERE NOMARC = '$this->name' AND ID_USER = '$this->userID'";
        $stmt = $con->query($requete);
        $result = $stmt->rowCount();
        if ($result == 0) {
            return false;
        } else {


            echo " <script > triggerMessageBox('error', 'Cet arc existe déjà!') </script >";


        }
        return true;
    }

    /**
     * Récupère ces valeurs et les envoies dans la base de données.
     * Utilise checkArc.
     */
    public function creerArc()
    {
        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();


        if ($this->checkArc() == false) {

            $requete = "INSERT INTO arc (ID_USER, NOMARC, POIDSARC, TAILLEARC, PWRARC, TYPEARC, PHOTOARC, COMMARC) VALUES (:idUser, :nomArc, :poidsArc, :tailleArc, :pwrArc, :typeArc, :photoArc,:commArc)";
            $add = $con->prepare($requete);
            $add->bindParam(':idUser', $this->userID);
            $add->bindParam(':nomArc', $this->name);
            $add->bindParam(':poidsArc', $this->weight);
            $add->bindParam(':tailleArc', $this->size);
            $add->bindParam(':pwrArc', $this->power);
            $add->bindParam('typeArc', $this->type);
            $add->bindParam('commArc', $this->commArc);
            $add->bindParam('photoArc', $this->picture);
            $add->execute();




        } else {


            echo "Données saisis invalides ou arc existe déjà";


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
       // $log_message = "idArc: " . $arcID ." supprimé par idUser: " . $this->idUser;
        //$logFile->open();
        //$logFile->write($log_message);
        //$logFile->close();
    }
    public function __destruct()
    {

    }
}

?>