<?php

require_once ("../db_config.php");

if(!isset($_POST['deleteRecord'])){
    header('Location: delete.php');
    die();
} else{
    if(!isset($_POST['id'])){

        header('Location: edit.php');
        die();
    } else{
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        $query = "DELETE FROM books
              WHERE id = :id";
    }
}
$results = $db_connection->prepare($query);
$results->execute([
    'id' => $id]);

if($db_connection->prepare($query)){
    echo "<div style='color:green'>Records deleted successfully.</div>". " <a href=\"list-books.php\" > click here to go home </a>";
} else{
    echo "<div style='color:red'>ERROR: Could not delete record.</div>". " <a href=\"list-books.php\" > click here to go home </a>";
}

$db_connection= NULL;