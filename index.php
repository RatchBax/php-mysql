<?php

include('variables.php');

include('functions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Site de recettes - Page d'accueil</title>
    <link rel="stylesheet" href="styleSheet.css">
</head>

<body>

    <?php include('header.php');?>

    <h1>Site de recettes</h1>
    <?php foreach (getRecipes($recipes) as $recipe) {
        echo "<h2>" . $recipe['title'] . "</h2>";
        echo "<em>" . displayAuthor($recipe['author'], $users) . "</em>" . '<br>';
    }?>
    <br>

    <?php include('footer.php');?>
</body>

</html>