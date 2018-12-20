<?php

require_once('../controllers/classes/ConnexionBDD.php');


/**
 * Elle permet de creer et supprimer des blasons.
 */
class Blason
{

    /**
     * ID du blason générer par la base de données.
     * @var int
     */
    private $blazID;

    /**
     * ID de l'utilisateur a qui l'arc appartient.
     * @var int
     */
    private $userID;

    /**
     * Nom de blason.
     * @var string
     */
    private $name;

    /**
     * Taille du blason.
     * @var int
     */
    private $size;

    /**
     * Emplacement de la photo du blason.
     * @var string
     */
    private $picture;

    /**
     * Blason constructor.
     * @param $name
     * @param $size
     * @param $picture
     */
    public function __construct($name, $size, $picture)
    {


        $this->userID = 1;
        $this->name = addslashes($name);
        $this->size = $size;
        $this->picture = $picture;

        $this->creerBlason();

        $this->blazID = $this->getBlasonID();

    }

    /**
     * Renvoie l'ID du blason..
     * Utile pour ensuite le recuperer dans la base de données.
     * @return mixed
     */
    public function getBlasonID()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $requete = "SELECT ID_BLAS FROM blason WHERE ID_USER = ? AND NOMBLAS = ? AND TAILLEBLAS = ? AND PHOTOBLAS = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->userID, $this->name, $this->size, $this->picture]);
        $result = $stmt->fetchColumn();

        return $result;
    }

    /**
     * Vérifie si les valeurs du blason sont valides.
     * Appeller avant d'envoyer les valeurs dans la base de données.
     * @return bool
     */
    public function checkBlason()
    {

        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $requete = "SELECT COUNT(ID_BLAS) FROM blason WHERE NOMBLAS = ? AND ID_USER = ?";
        $stmt = $con->prepare($requete);
        $stmt->execute([$this->name, $this->userID]);
        $result = $stmt->fetchColumn();
        if ($result == 0) {
            return false;
        } else {


            echo "Cet Blason existe déjà!";


        }
        return true;

    }

    /**
     * Récupère ces valeurs et les envoies dans la base de données.
     * Utilise checkBlason.
     */
    public function creerBlason()
    {


        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        if ($this->checkBlason() == false) {

            $requete = "INSERT INTO blason (ID_USER, NOMBLAS, TAILLEBLAS, PHOTOBLAS) VALUES (:idUser, :nomBlas, :tailleBlas, :photoBlas)";

            $add = $con->prepare($requete);
            $add->bindParam(':idUser', $this->userID);
            $add->bindParam(':nomBlas', $this->name);
            $add->bindParam(':tailleBlas', $this->size);
            $add->bindParam(':photoBlas', $this->picture);

            $add->execute();


        } else {


            echo 'Données saisis invalides ou Blason existe déjà';


        }
    }

    /**
     * Supprime le blason de la base de données.
     * @param $idBlason
     */
    public function supprimerBlason()
    {


        $bdd = new ConnexionBDD();
        $con = $bdd->getCon();

        $blasID = $this->blazID;
        $requete = "DELETE FROM blason WHERE ID_BLAS = '$blasID'";

        $con->exec($requete);


    }
}


?>


