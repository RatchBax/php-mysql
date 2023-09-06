<?php
    // Déclaration du tableau des recettes
    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => 'Etape 1 : Préparer le piège à cassoulet volant',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => 'Etape 1 : Aller acheter du Couscous.',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => false,
        ],
        [
            'title' => 'Escalope milanaise',
            'recipe' => 'Etape 1 : Aller acheter les ingrédients',
            'author' => 'mathieu.nebra@exemple.com',
            'is_enabled' => true,
        ]
    ];    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Affichage des recettes</title>
        <link rel="stylesheet" href="styleSheet.css">
    </head>
    <body>
        <h1>Afficher des recettes</h1>
        <?php foreach($recipes as $recipe) {
            if ($recipe['is_enabled']) {
                echo "<h2>" . $recipe['title'] . "</h2>";
                echo $recipe['recipe'] . '<br>';
                echo "<em>" . $recipe['author'] . "</em>" . '<br>';
            }
        } ?>
        <br>
    </body>
</html>