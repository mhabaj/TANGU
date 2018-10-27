


<?php

function connexion_requete($req)
{
	$db = new mysqli("localhost", "root", "", "tangubdd");

	if($db->connect_errno){
		die("erreur $db->connect_error");
	}
	else
	{
	$data = $db->query($req);
	return $data;
	}
}


function affichage($data)
{
	// position au début
	$data->data_seek(0);
	// booléen pour gérer la première ligne
	$first = true;
	
	echo '<table  >';

	while ($row = $data->fetch_assoc())
	
	{
		
		// pour la première ligne
		if ($first)
		{
			$first = false;
			echo '<tr>';
			foreach ($row as $key => $value)
				echo "<th> <strong>{$key} </strong></th>";
			echo '</tr>';
		}

		echo '<tr>';
		foreach ($row as $key => $value)
			echo "<td> {$value} </td>";
		echo '</tr>';
		
		
	}
	echo'</table>';
}

?>