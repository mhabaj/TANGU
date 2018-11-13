<?php

include ('../controller/classes/entrainement.php');


?>
<form method="GET">
<?php

$stmt = $bdd->query("SELECT * FROM `serie` WHERE ID_USER='$ID_user' and ID_ENT_USER='$'");

$nbrOccur = $stmt->rowCount();

if ($nbrOccur == 0) {


?>

    <select name="Serie">
        <option value="" selected></option>
        <option value=""></option>
        <option value=""></option>
    </select>
</form>



