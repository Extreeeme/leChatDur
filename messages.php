<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '' ); // Connexion à la base de données
$contenu = $bdd->query("SELECT * FROM chat ORDER BY id DESC");
foreach ($contenu as $ligne) {
			if($ligne['pseudo'] == "Martin"){
				echo '<span id="admin" ><span id="Martin" >&lt;'. $ligne['pseudo'] . '&gt; </span> ' . $ligne['message'] . '</span><br/>';
			}else{
				echo '&lt;'. $ligne['pseudo'] .'&gt; '. $ligne['message'] .  '<br/>';
			}
		}

?>