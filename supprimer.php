<?php

session_start();

include_once('mysql.php');
include_once('variables.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo('Il faut un identifiant de recette pour le modifier');
    return;
}

$retrieveRecipeStatement = $db->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => $getData['id'],
]);

header('Location: index.php');
?>