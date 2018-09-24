<?php
require_once('../db_config.php');

$query = "SELECT * FROM books";

$results = $db_connection->query($query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database GUI!!!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<div class = "container">
    <a href="create.php" ><i class="fa fa-plus-square" aria-hidden="true"> Add new record</i></a>
    <table class="table">

        <thead>
        <tr>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>GENRE</th>
            <th>PUBLISHER</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($results as $result) {

            ?>
            <tr>
                <td><?php echo $result['title']?></td>
                <td><?php echo $result['author']?></td>
                <td><?php echo $result['genre']?></td>
                <td><?php echo $result['publisher']?></td>
                <td><a href="edit.php?id=<?php echo $result['id']?>"><i class = "fas fa-edit"></i></a></td>
                <td><a href="edit.php?id=<?php echo $result['id']?>"><i class="fa fa-trash" aria-hidden="true" ></i></a></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>