<?php
$body = "body2";
$title = 'Profil';
require('header.php');

session_start();

    $bdd= mysqli_connect('localhost', 'root','root', 'moduleconnexion');
    mysqli_set_charset($bdd, 'utf8');
    $user_login = $_SESSION['login'];
   
    $requete = "SELECT * FROM utilisateurs WHERE login = '$user_login'";
    
    $requete = mysqli_query($bdd, $requete);
    $reponse = mysqli_fetch_all($requete, MYSQLI_ASSOC);
   
        $idbdd = $reponse[0]['id'];
        $loginbdd =$reponse[0]['login'];
        $prenombdd =$reponse[0]['prenom'];
        $nombdd =$reponse[0]['nom'];
        $passwordbdd =$reponse[0]['password'];

    
    if (!empty($_POST)){
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $confirm_password = $_POST["confirm_password"];
    $loginsession = $_SESSION['login'];

    $demandesql= "UPDATE `utilisateurs` SET `login`='$login',`prenom`='$prenom',`nom`='$nom',`password`='$password' WHERE id=$idbdd";
    $select = mysqli_query($bdd, $demandesql);
    header("Refresh:0");
  
        $_SESSION['login']= $login;
        $_SESSION['password']= $password;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION["confirm_password"] = $confirm_password;
    }



?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="moduleconnexion.css">
        <title>Page de profil</title>
    
       
    </head>
    <body>         
<table class="table">
<form action="profil.php" name="form" method="post" id="form">

<tr>
    <td>
     <label for="login"> Modifier login :</td>
    <td>
    <input type="login" name="login" id="login"></label> <br></td>

</tr>


<tr>
    <td>
    <label for="prenom"> Modifier prénom :</td>
    <td>
    <input type="prenom" name="prenom" id="prenom"></label> <br></td>
</tr>

<tr>
    <td>
    <label for="nom"> Modifier nom :</td>
    <td>
    <input type="nom" name="nom" id="nom"></label> <br></td>
</tr>

<tr>
    <td>
    <label for="password"> Modifier mot de passe :</td>
    <td>
    <input type="password" name="password" id="password"></label> <br></td>

</tr>

<tr>
    <td>
    <label for="confirm_password"> Confirmer le nouveau mot de passe :</td>
    <td>
    <input type="password" name="confirm_password" id="confirm_password"></label> <br></td>
</tr>

<tr>
<td>
<input type="submit" name="submit" value="registration"></td>
</tr>
</form> 

</table>

</body>

  <a class="footer" href="deconnexion.php">DECONNEXION</a>

</html>

<footer>
<a class="footer" href="https://github.com/fatimazahra-meslouhmosca/module-connexion.git">Github</a>
</footer>