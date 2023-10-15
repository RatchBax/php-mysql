<?php
    function getPosts() {
        // We connect to the database.
        try {
            $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        // We retrieve the 5 last blog posts.
        $statement = $database->query(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
            AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );

        $posts = []; 
        while ($row = $statement->fetch()) {
            $post = [
                'title' => $row['title'],
                'content' => $row['content'],
                'frenchCreationDate' => $row['creation_date_fr']
            ]; 
            $posts[] = $post;
        }
        return $posts;
    }