<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion à la base de données
$contenu = $bdd->query("SELECT * FROM chat ORDER BY id DESC");

if( $_SESSION["pseudo"] != "Martin"  AND $_SESSION["pseudo"] != "Aymeric"){
	foreach ($contenu as $ligne) {
		if($ligne['pseudo'] == "Martin"){
			echo '<span id="admin" ><span id="Martin" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
		}elseif ($ligne["pseudo"] == "Aymeric"){
			echo '<span id="admin2" ><span id="Aymeric" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
		}else{
			echo '&lt;'. $ligne['pseudo'] .'&gt; '. $ligne['message'] .  '<br/>';
		}
	}
}else{
	foreach ($contenu as $ligne) {
		if($ligne['pseudo'] == "Martin"){
			echo '[ ' .$ligne["id"]. ' ] <span id="admin" ><span id="Martin" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
		}elseif ($ligne["pseudo"] == "Aymeric"){
			echo '[ ' .$ligne["id"]. ' ] <span id="admin2" ><span id="Aymeric" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
		}else{
			echo '[ ' . $ligne["id"]. ' ] &lt;'. $ligne['pseudo'] .'&gt; '. $ligne['message'] .  '<br/>';
		}
	}
}
?>