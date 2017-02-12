<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inscription le Chat Dur</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="container">
		
		<div id="inscription">
			
			<h2 id="titreInscription">Inscription<h2>
			<?php
				if(isset($_GET["verification"])){
					if($_GET["verification"] == 1){
						echo "<p id='erreur' > Ce pseudo est déjà utilisé</p>";
					}elseif ($_GET["verification"] == 2){
						echo "<p id='erreur' > Veuillez entrer un pseudo valide</p>";
					}
				}
			?>

			<form action="inscription.php" method='post'>
				<div id="formulaire">
					<label>Votre pseudo : </label><input type='text' name='pseudo' placeholder='Pseudo' >
					<label>Mot de Passe : </label><input type='password' name='password' placeholder='Mot de passe' >
					<button type='submit' name='bouton2'>Inscription</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>