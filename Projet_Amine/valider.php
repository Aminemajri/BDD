<?php

//Connexion à la base de donnée
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

//Test du Connexion
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


//Notre requête
$req = $bdd->prepare('INSERT INTO benifit(Num_compte, banque, ville, situation)
                      VALUES(:numero, :banque, :ville, :situation)')  or die(print_r($bdd->errorInfo()));

$req->execute(array(
      'numero' => htmlspecialchars($_POST['numero']),
      'banque' => htmlspecialchars($_POST['banque']),
      'ville' => htmlspecialchars($_POST['ville']),
      'situation' => htmlspecialchars($_POST['situation'])
));

header('Location: validation.php');

 ?>
