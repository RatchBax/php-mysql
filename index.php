<?php session_start(); // $_SESSION ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Inclusion des fichiers utilitaires -->
    <?php 
        include_once('variables.php');
        include_once('functions.php');
    ?>
    <!-- On se connecte à MySQL -->
    <?php include_once('mysql.php'); ?>
    <!-- Si tout va bien, on peut continuer -->
    <?php
    
    // On récupère tout le contenu de la table recipes
        $sqlQuery = 'SELECT * FROM recipes';
        $recipesStatement = $db->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
    ?>
    <!-- Inclusion du formulaire de connexion -->
    <?php include_once('login.php'); ?>
    
    <h1>Site de Recettes !</h1>

    <!-- Si l'utilisateur existe, on affiche les recettes -->
    <?php if(isset($_SESSION['LOGGED_USER'])): ?>
        <?php foreach(getRecipes($recipes, 5) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                <table>
                    <tr>
                    <!--<a href=\"description.php?code=" . $row['idOffers'] . "\">" . $row['CompagnyName'] . "</a>-->
                        <th><a href="update.php?id=<?php echo $recipe['recipe_id']?>">Editer l'article</a></th>
                        <th><a href="supprimer.php?id=<?php echo $recipe['recipe_id']?>">Supprimer l'article</a></th>
                    </tr>
                </table>
                <br>
            </article>
        <?php endforeach ?>
    <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>