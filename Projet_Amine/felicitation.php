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
$reponse = $bdd->query('SELECT Nom FROM benevole');

// On affiche chaque entrée une à une
$donnees = $reponse->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style_interface.css">
	<title></title>
</head>
<body>
  
	 <p class="valider">
    <strong> Merci monsieur  :  '<?php echo $donnees['Nom']; ?>' pour votre soutien !<br /> </strong>
   </p>
   <a href="interface.php">
        <span></span>
        Interface
      </a>

</body>
</html>
