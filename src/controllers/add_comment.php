<?php
use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

require_once('src/model/comment.php');

function addComment(string $post, array $input)
{
    $comments = new CommentRepository();
    $comments->connection = new DatabaseConnection();
    $author = null;
    $comment = null;
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $success = $comments->createComment($post, $author, $comment);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $post);
    }
}
