<?php

require_once ("../db_config.php");

if(!isset($_POST['updateRecord'])){
    header('Location: edit.php');
    die();
} else{
    if(!isset($_POST['id'])){

        header('Location: edit.php');
        die();
    } else{
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
        $genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
        $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
        $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);

        $query = "UPDATE books 
                  SET title = :title,
                      author = :author,
                      genre = :genre,
                      height = :height,
                      publisher = :publisher
                  WHERE id = :id";
        $results = $db_connection->prepare($query);
        $results->execute([
            'title' => $title,
            'id' => $id,
            'author' => $author,
            'genre' => $genre,
            'height' => $height,
            'publisher' => $publisher
        ]);
    }
    if($db_connection->prepare($query)){
        echo "<div style='color:green'>Records updated successfully.</div>". " <a href=\"list-books.php\" > click here to go home </a>";
    } else{
        echo "<div style='color:red'>ERROR: Could not update record.</div>". " <a href=\"list-books.php\" > click here to go home </a>";
    }
}