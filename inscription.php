<?php
	$verification = 0;
	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion à la base de données
	$pseudo = $_POST["pseudo"];
	$password = $_POST["password"];
	$utilisateurs = $bdd->query("SELECT * FROM login");
	foreach ($utilisateurs as $key => $login) {
		if($login['pseudo'] == $pseudo){
			$verification = 1;
		}
	}

	if($pseudo == '' OR $pseudo != htmlspecialchars($pseudo)){
		$verification = 2;
	}

	if($verification == 0){
		$envoi = $bdd->prepare('INSERT INTO login(pseudo, password) VALUES(:pseudo, :password) ');
		$envoi->execute(array('pseudo' => $pseudo, 'password' => $password));
		header('Location: index.php');
	}else{
		header('Location: formulaireInscription.php?verification='. $verification.'');
	}
	
?>