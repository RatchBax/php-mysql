<?php

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

function post(string $identifier) {
    $postRepository = new PostRepository();
    $comment = new CommentRepository();
    $postRepository->connection = new DatabaseConnection();
    $comment->connection = new DatabaseConnection();
    $post = $postRepository->getPost($identifier);
    $comments = $comment->getComments($identifier);
    require('templates/post.php');
}