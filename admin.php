<?php
session_start();

$bdd = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion');
mysqli_set_charset($bdd,'utf8');

$requete = mysqli_query($bdd, "SELECT * FROM utilisateurs");

$utilisateurs = mysqli_fetch_all($requete, MYSQLI_ASSOC);

if (!isset($_SESSION['login'])){
    header ('location: connexion.php');

}

if (isset($_SESSION['login']) && $_SESSION['login'] !="admin" ){
    header ('location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<table>
    <thead>
        <tr>
        <th>id</th>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($utilisateurs as $utilisateur){
            echo '<tr><td>'.$utilisateur['id']. '</td>';
            echo '<td>'.$utilisateur['login']. '</td>';
            echo '<td>'.$utilisateur['prenom']. '</td>';
            echo '<td>'.$utilisateur['nom']. '</td></tr>';
        };
        ?>

    </tbody>
</table>

<a class="footer" href="deconnexion.php">DECONNEXION</a>

</body>
</html>

<footer>
<a class="footer" href="https://github.com/fatimazahra-meslouhmosca/module-connexion.git">Github</a>
</footer>