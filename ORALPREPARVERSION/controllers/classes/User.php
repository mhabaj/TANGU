<?php
include 'controllers/functions/connexion_bdd.php';

//require('../controller/functions/control-session.php');
require_once('controllers/classes/Log.php');



//include '../includes/connexion_bdd.php';
require('controllers/functions/functions.php');

global $bdd;
$msg = "";

//Nouvelle instance globale de Log, puis ouvrir le fichier
global $logFile;
$logFile->open();

class User {
    private $pseudo;
    private $mdp;
    
    public function __construct($pseudo, $mdp) {
        
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        
        echo "<p>Objet User instancié</p>";
    }
    
    public function inscription($verif_mdp) {
        //Check si pseudo, mdp et verif_mdp sont valides
        //hash mdp et verif_mdp
        //Inserer dans bdd
        global $bdd;
        global $msg;
        
        if(checkMdp($this->mdp) && equivMdp($this->mdp, $verif_mdp) && checkPseudo($this->pseudo) && checkExistPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);
            
            //Inserer valeurs
            $requete = "INSERT INTO users (PSEUDO, PASSWORD) VALUES (?, ?)";
            $stmt = $bdd->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);
            
            //Afficher msg de succès
            $msg .= "<p>Votre compte est crée! <a href='connexion.php'>Connexion ici</a></p>";
            
        } else {
            $msg .= "<p>Inscription non effectuée</p>";
        }
    }
    
    public function connexion() {
        //Check si pseudo, mdp sont valides
        //hash mdp
        //Comparer pseudo et mdp avec bdd
        global $bdd;
        global $msg;
        
        if(checkMdp($this->mdp) && checkPseudo($this->pseudo)) {
            //Hashage du mdp
            $hash_mdp = sha1($this->mdp);
            
            //Inserer valeurs
            $requete = "SELECT * FROM users WHERE PSEUDO = ? AND PASSWORD= ?";
            $stmt = $bdd->prepare($requete);
            $stmt->execute([$this->pseudo, $hash_mdp]);
            $result = $stmt->rowCount();
            
            if($result == 1) {
                session_start();
                $infoUser = $stmt->fetch();
                $_SESSION['ID'] = $infoUser['ID_USER'];
                $_SESSION['PSEUDO'] = $infoUser['PSEUDO'];
                $User_ID = $infoUser;
                
                $msg .= "<p>Connexion reussie</p>";
                header("Location: training.php");
            } else {
                $msg .= "<p>Mauvaise combis pseudo/mdp</p>";
            }
        }
    }
}

//$pseudo = "Matt";
//$mdp = "123456";
//$verif_mdp = "123456";
/*$user = new User($pseudo, $mdp, $verif_mdp);
$user->inscription();
var_dump($msg);
*/

$logFile->close();
?>