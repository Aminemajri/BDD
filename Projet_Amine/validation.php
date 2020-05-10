<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table 
$reponse = $bdd->query('SELECT Nom FROM benefice');

// On affiche chaque entrée une à une
$donnees = $reponse->fetch();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<title></title>
	</head>
	<body>
		<p class="valider">
		<strong> Monsieur  :  '<?php echo $donnees['Nom']; ?>', votre demande est en cours de traitement, merci !<br /> </strong>
		</p>
		<a href="interface.php">
			<span></span>
			Interface
		</a>
	</body>
</html>
