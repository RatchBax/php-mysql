<!--
    NOTE POUR LA CORRECTION

    Ce commit contient encore des modifications pour la partie d'avant car je n'avais pas comprit qu'il fallait refaire
    un autre fichier "post.php" à la racine du dossier de travail.
-->

<?php    
require('post.php');
require('src/model.php');
$posts = getPosts();
require('templates/homepage.php');