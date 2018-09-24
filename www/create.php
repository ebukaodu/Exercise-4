
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit a Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>

<body>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number"  readonly class="form-control" id="id" name="id" value="<?php echo $result['id']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="genre" name="genre" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="height" class="col-sm-2 col-form-label">Height</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="height" name="height" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="publisher" name="publisher" value="">
            </div>
        </div>

        <button type="submit" name="createRecord" class="btn btn-success">Create Record</button>

    </form>
</div>


</body>


</html>


<?php
require_once ('../db_config.php');

if (isset($_POST['createRecord'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $height = $_POST['height'];
    $publisher = $_POST['publisher'];

    $query = "INSERT INTO  books(id,title,author,genre,height,publisher)
              VALUES ( NULL, '$title', '$author', '$genre','$height','$publisher' )";


    if ($db_connection->exec($query)) {
        echo "<div style='color:green'>Records inserted successfully.</div>". " <a href=\"list-books.php\" > click here to go home </a>";
    } else {
        echo "<div style='color:red'> ERROR: Could not insert record. </div>>". " <a href=\"list-books.php\" > click here to go home </a>";
    }


    $db_connection = NULL;
}
?>
