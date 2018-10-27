<?php
include ('../backend/classes/User.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscritpion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body >
	
	<div class="limiter couleurs">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Inscription
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Nom d'utilisateur requis">
						<input class="input100" type="text" name="pseudo" placeholder="Nom d'utilisateur">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Mot de passe requis">
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = " verification de Mot de passe requis">
						<input class="input100" type="password" name="mdp2" placeholder="Verification de mot de passe">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						

						<div>
							<a href="connexion.php" class="txt1">
								Vous avez déjà un compte? Connectez vous!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit"  name="formInscription" class="login100-form-btn">
						Inscription
                        </button>
                    </div>
				</form>
                <?php include '../backend/includes/creation_user.php';?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


</body>
</html>