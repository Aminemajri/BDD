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
$req = $bdd->prepare('INSERT INTO benevole(Nom, Prenom, CIN, Tel)
                      VALUES(:nom, :prenom, :cin, :tel)')  or die(print_r($bdd->errorInfo()));

$req->execute(array(
      'nom' => htmlspecialchars($_POST['nom']),
      'prenom' => htmlspecialchars($_POST['prenom']),
      'cin' => htmlspecialchars($_POST['cin']),
      'tel' => htmlspecialchars($_POST['tel'])
));

// header('Location: felicitation.php');

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="design.css">
     <title></title>
   </head>
   <body>
     <div class="">
       <form action="finaliser.php" method="post">
           <p class="methode">
             <label for="nom">Numéro de compte</label> : <input type="text" name="numero" placeholder="Votre numéro de compte..."/><br />
             <label for="prenom">Nom du banque</label> :  <input type="text" name="banque" placeholder="Votre banque.."/><br />
             <label for="num">Ville</label> : <input type="text" name="ville" placeholder="Votre ville.."/><br />
             <label for="cin">Montant en euro</label> : <input type="text" name="montant" placeholder="Votre montant.."/><br />
             <input type="submit" value="Valider" />
            </p>
       </form>
     </div>
   </body>
 </html>
