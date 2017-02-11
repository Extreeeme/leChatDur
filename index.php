<?php 
	session_start();
	$connect = false;
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' );
	if(isset($_POST['pseudo'], $_POST['password'])){
		
		$_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
		$_SESSION['password']= $_POST['password'];

		$utilisateurs = $bdd->query("SELECT * FROM login");
		foreach ($utilisateurs as $key => $login) {
			if($login['pseudo'] == $_SESSION['pseudo'] AND $login['password'] == $_SESSION['password']){
				$connect = true;
			}
		}
		if($connect == false){
			session_unset(); 
			session_destroy();
		}
	}	
?>


<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion à la base de données
	$contenu = $bdd->query("SELECT * FROM chat ORDER BY id DESC");// Selectionne tout le contenu du tableau 'chat' par id décroissant
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		function message() {
		   $.ajax({
		      type: "GET",
		      url: "messages.php"
		   }).done(function (html) {
		      $('#messages').html(html); // Retourne dans #maDiv le contenu de ta page
		      setTimeout(message, 5000);
		   });
		}      
		message();
	</script>
	<title>Le chat de la fabrik !</title>
</head>
<body>

<div id="container">
	<div id="utilisateur">
		<?php 

		if(isset($_SESSION["pseudo"], $_SESSION["password"])){
			echo 'Bienvenue '. $_SESSION["pseudo"];
			echo "<form action='traitement.php' method='post'>";
			echo 	"<label>Message : </label><input type='text' name='message' placeholder='Message' >";
			echo 	"<button type='submit' name='bouton'>Envoyer</button>";
			echo "</form>";
		}else{
			echo "<form action='index.php' method='post'>";
			echo "<label>Votre pseudo : </label><input type='text' name='pseudo' placeholder='Pseudo' >";
			echo "<label>Mot de Passe : </label><input type='password' name='password' placeholder='Mot de passe' >";
			echo 	"<button type='submit' name='bouton2'>Connexion</button>";
			echo "</form>";
		}

		?>
	</div>

	<?php

		echo '<div id="messages">';
		//On parcoure le tableau et à chaque nouvelles lignes, on ajoute son contenu dans la variable $ligne
		// foreach ($contenu as $ligne) {
		// 	if($ligne['pseudo'] == "Martin"){
		// 		echo '<span id="admin" ><span id="Martin" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
		// 	}else{
		// 		echo '&lt;'. $ligne['pseudo'] .'&gt; '. $ligne['message'] .  '<br/>';
		// 	}
		// }

		echo '</div>';

		if(isset($_SESSION["pseudo"], $_SESSION["password"])){
			echo "<form action='deconnexion.php' method='post'>";
			echo 	"<button type='submit' name='bouton'>Déconnexion</button>";
			echo "</form>";
		}

	?>
</div>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>