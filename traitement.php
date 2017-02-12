<?php 
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion à la base de données
	$pseudo = $_SESSION['pseudo']; // pseudo saisi par l'utilisateur
	$message = htmlspecialchars($_POST['message']); // message saisi par l'utilisateur

	// Prepare la requete qui est : insert dans le tab 'chat' (catégorie pseudo et message)
	// des valeurs encore non définies ! 
	$messageSplit = explode(" ", $message);
	if($messageSplit[0] == "/r" AND ($_SESSION["pseudo"] == "Martin"  OR $_SESSION["pseudo"] == "Aymeric")	 ){
		$bdd->exec('DELETE from chat WHERE id=$messageSplit[1]');
		$req = $bdd->prepare('DELETE from chat WHERE id='.$messageSplit[1].'');
		$req->execute(array(
		'id' => $messageSplit[1]));
	}else{

	$envoi = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(:pseudo, :message) ');
	
	// Execute la requete, en précisant que les valeurs qui étaient inconnues sont renseignées
	$envoi->execute(array('pseudo' => $pseudo, 'message' => $message));
	}
	

	header('Location: index.php');
	
?>