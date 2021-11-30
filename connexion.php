<?php
session_start();

$body = "body2";
$title = 'Connexion';
require('header.php');

$bdd= mysqli_connect('localhost', 'root','root', 'moduleconnexion');
mysqli_set_charset($bdd, 'utf8');


if (!empty($_POST)){

    $login = $_POST['login'];
    $password = $_POST['password'];

$requete =  "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password' ";


$requete = mysqli_query($bdd, $requete);
$reponse = mysqli_fetch_all($requete);


    if ( isset($login, $password) && !empty($login) && !empty($password)){
    
    

    $count = count($reponse);


            if ($count == 1){
            
                $_SESSION ['login'] = $login;
                $_SESSION['password'] = $password;
                $_SESSION['prenom']= $prenom;
                $_SESSION['nom']= $nom;
            

                echo "<pre>"; var_dump($reponse); echo "</pre>";
                header('location: profil.php');
            
            }

            else {
                echo "Login et/ou password incorrects ";
            }
    }


    if ( isset($login, $password) && $login == 'admin' && $password == 'admin'){
        header('location: admin.php');
    }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="moduleconnexion.css">
    <title>Page de connexion</title>

   
</head>
<body>
<table class= "table">

 <form  action="connexion.php" name="form" method="post" id="form">

 <tr>
    <td>
     <label for="login"> Login :</td>
    <td>
    <input type="login" name="login" id="login"></label> <br></td>

</tr>


<tr>
    <td>
    <label for="password"> Mot de passe :</td>
    <td>
    <input type="password" name="password" id="password"></label> <br></td>

</tr>


<tr>
<td>
<input type="submit" name="submit" value="registration"></td>
</tr>

</form>
</table>

<a class="footer" href="deconnexion.php">DECONNEXION</a>

</body>
</html>

<footer>
<a class="footer" href="https://github.com/fatimazahra-meslouhmosca/module-connexion.git">Github</a>
</footer>