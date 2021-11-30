
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='header.css'>
    <link rel='stylesheet' href='footer.css'>
    <link rel='stylesheet' href='moduleconnexion.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Old+Mincho&display=swap" rel="stylesheet"> 
    <title><?php echo $title; ?></title>
</head>
<body class="<?php echo $body; ?>">
<header>
    <nav class="navbar" role="navigation" aria-label="navigation">
        <?php
                if(isset($_SESSION['connected']))
                {
                echo '<form action="deconnexion.php" method="post">
                <input type="submit" name="deconnecter" value="se déconnecter"></input>
                </form>';
                }
        ?>
        <ul class="navbar-list" role="list" aria-label="navigation items">
            <li class="navbar-item" aria-label="Accueil">
            <a href="index.php" class="navbar-link" aria-label="home link">ACCUEIL</a>
            </li>
            <?php
                    if(!isset($_SESSION['connected']))
                    {

                        echo '<li class="navbar-item" aria-label="Connexion">
                        <a href="connexion.php" class="navbar-link" aria-label="connexion link">CONNEXION</a>
                        </li>';
                    }
                    
            ?>
            <?php 
                if(!isset($_SESSION['connected']))
            {              
                echo '<li class="navbar-item" aria-label="Inscription">
                <a href="inscription.php" class="navbar-link" aria-label="inscription link">INSCRIPTION</a>
                </li>';
            } 

            ?>

            <?php
            if(isset($_SESSION['connected']))
            echo '<li class="navbar-item" aria-label="Profil">
            <a href="profil.php" class="navbar-link" aria-label= "profil link">PROFIL</a>
            </li>';
            ?>
            <?php

                if(isset($_SESSION['admin']) && $_SESSION['admin']["login"]=='admin')
                {
                    echo '<li class="navbar-item" aria-label="Admin">
                    <a href="admin.php" class="navbar-link" aria-label="admin link">ADMIN</a>
                    </li>';
                
                }
            
            ?>
        </ul>
    </nav>
</header>
