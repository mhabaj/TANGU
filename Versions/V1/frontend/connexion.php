<?php
include ('../backend/fct/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">

<!--===============================================================================================-->
</head>
<body >

	<div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Nom d'utilisateur requis">
						<input class="input100" type="text" name="pseudoconnect" placeholder="Nom d'utilisateur">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Mot de passe requis">
						<input class="input100" type="password" name="mdpconnect" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						

						<div>
							<a href="inscription.php" class="txt1">
								Vous n'avez pas de compte?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit"  name="formconnexion" class="login100-form-btn">
						Connexion
						</button>
					</div>
					

				</form>
				<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>



</body>
</html>