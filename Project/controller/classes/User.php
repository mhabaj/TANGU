<?php
//require_once('../classes/Log.php');

require('../functions/functions.php');

//include '../includes/connexion_bdd.php';
//require('../includes/functions.php');

$msg = "";

//Nouvelle instance globale de Log, puis ouvrir le fichier
//global $log_file;
//$log_file->open();

/**
 * Class User
 */
class User {
    /**
     * Identifiant entré par l'utilisateur.
     * @var
     */
    private $pseudo;

    /**
     * Mot de passe entré par l'utilisateur.
     * @var
     */
    private $mdp;

    /**
     * User constructor.
     * @param $pseudo
     * @param $mdp
     */
    public function __construct($pseudo, $mdp) {

        include '../functions/connexion_bdd.php';

        $this->bdd = $bdd;

        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        
        echo "<p>Objet User instancié</p>";
    }

    /**
     * Verifie si les variables pseudo et mdp sont valides.
     * Récupère ces variables et les envoient dans la base données.
     * @param $verif_mdp
     */
    public function inscription($verif_mdp) {

        global $msg;
        
        if(checkMdp($this->mdp) && equivMdp($this->mdp, $verif_mdp) && checkPseudo($this->pseudo) && checkExistPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);
            
            //Inserer valeurs
            $requete = "INSERT INTO users (PSEUDO, PASSWORD) VALUES (?, ?)";
            $stmt = $this->bdd->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);
            
            //Afficher msg de succès
            $msg .= "<p>Votre compte est crée! <a href='connexion.php'>Connexion ici</a></p>";
            
        } else {
            $msg .= "<p>Inscription non effectuée</p>";
        }
    }

    /**
     * Vérifie si le pseudo et le mot de passe sont valides.
     * Compare ces valeurs avec celles deja presentes dans la base de données.
     */
    public function connexion() {
        //Check si pseudo, mdp sont valides
        //hash mdp
        //Comparer pseudo et mdp avec bdd
        global $msg;
        
        if(checkMdp($this->mdp) && checkPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);
            
            //Inserer valeurs
            $requete = "SELECT * FROM users WHERE PSEUDO = ? AND PASSWORD= ?";
            $stmt = $this->bdd->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);
            $result = $stmt->rowCount();
            
            if($result == 1) {
                session_start();
                $infoUser = $stmt->fetch();
                $_SESSION['ID'] = $infoUser['ID_USER'];
                $_SESSION['PSEUDO'] = $infoUser['PSEUDO'];
                $User_ID = $infoUser;
                
                $msg .= "<p>Connexion reussie</p>";
                header("Location: index.php");
            } else {
                $msg .= "<p>Mauvaise combis pseudo/mdp</p>";
            }
        }
    }
}

/*
$pseudo = "Matt";
$mdp = "123456";
$verif_mdp = "123456";
$user = new User($pseudo, $mdp, $verif_mdp);
$user->inscription();
var_dump($msg);
*/

//$log_file->close();
?>