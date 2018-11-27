<?php
require_once 'controllers/functions/control-session.php';
?>

   <?php

   if (!isset($_GET['new_ID_Ent'])){

       header("Location: training.php");

   }else {


       $new_ID_Ent = $_GET['new_ID_Ent'];

       ?>


       <p> Quel serie voudrez vous manipuler?</p>

       <form action="entrainement.php" method="POST" id="serieform">



       <select name="Serie" form="serieform" onchange='this.form.submit()'>
           <option value="null" disabled selected>Choisir une série</option>



           <?php

           //$new_ID_Ent = $_GET['new_ID_Ent'];


           include('controllers/functions/connexion_bdd.php'); //on se connect a la base et on envoie la requete

           $reponse = $bdd->query("SELECT * FROM serie WHERE ID_ENT_USER= '$new_ID_Ent' ORDER BY serie.ID_SERIE ASC");
           $n = 1;
           // On affiche chaque entrée une à une
           while ($donnees = $reponse->fetch()) {


               ?>


               <option value="<?php echo $donnees['ID_SERIE'] ?>">Serie numero <?php echo $n ?></option>


               <?php
               $n++;
           }

           $reponse->closeCursor(); // Termine le traitement de la requête

           ?>
       </select>
           <input name="new_ID_Ent" type="hidden" value="<?php echo $new_ID_Ent ?>">

       </form>
       <?php
   }

?>