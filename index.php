<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- désactive le mode de compatibilité d'Internet explorer
    <title>login</title> -->
    <?php include_once'php/connect_bdd.php';
    ini_set ('display_error',1);
    ?>

  </head>
  <body>

<form action="index.php" method="POST">
<!-- le <p> contient les messages. On affiche les retours d'erreur ici -->
<p id="message">
			<?php
			// si l'utilisateur a cliqué sur submit, $_POST est créé.
			// $_POST["submit"] existe donc est n'est pas NULL
			// On peut faire nos verif
			if (isset($_POST["submit"])){
				// Si l'utilisateur n'a pas rentré de login OU de password
				if ($_POST["login"] == "" || $_POST["password"] == ""){
					// Affichage erreur
					echo "Les champs doivent être complétés";
				}
				else {
					// Sinon, on verifie si le login existe et si le password est OK
					// Comme on veut afficher les eventuelles erreurs ici, dans le <p>
					// on affiche le résultat renvoyé par la fonction verify_login
					// On lui passe en paramètre le login et password entrés par l'utilsiateur
					echo verify_login($_POST["login"], $_POST["password"]);
				}
			}
			?>

</p>

  <label for="login">Login : <input type="text" id="login" name="login"/>
  </label><br/>
  <label for="password">Password : <input type="password" id="password" name="password"/>
  </label><br/>
  <input type="submit" id="submit" name="submit" value="Connexion"/>
</form>
  </body>
</html>
