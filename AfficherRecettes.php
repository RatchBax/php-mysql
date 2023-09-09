<?php
// Déclaration du tableau des utilisateur
$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

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
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];

//Retourne vrai ou faux selon si la recette est valide ou non
function isValidRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }
    return $isEnabled;
}

//Retourne toute les recettes valides
function getRecipes(array $recipes): array
{
    $validRecipes = [];
    foreach ($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

//Retourne le nom de l'auteur correspondant à l'email donnée en paramètre
function displayAuthor(string $authorEmail, array $users): string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Affichage des recettes</title>
    <link rel="stylesheet" href="styleSheet.css">
</head>

<body>
    <h1>Afficher des recettes</h1>
    <?php foreach (getRecipes($recipes) as $recipe) {
        echo "<h2>" . $recipe['title'] . "</h2>";
        echo "<em>" . displayAuthor($recipe['author'], $users) . "</em>" . '<br>';
    }?>
    <br>
</body>

</html>