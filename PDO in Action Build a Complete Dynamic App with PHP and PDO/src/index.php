<?php
// Start the session
session_start();
?>
<?php
require "conn.php";
$data = $conn->query('select * from tasks');

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos-App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=""
          crossorigin="">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <form method="post" action="insert.php" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputTodos" class="sr-only"></label>
            <input name="inputTodos" type="text" class="form-control" id="inputTodos" placeholder="enter your task">
        </div>
        <button name="submit" type="submit" class="btn btn-primary mb-2">Create</button>
    </form>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Task Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $rows = $data->fetchAll(PDO::FETCH_OBJ);
        $count = $data->rowCount();
        //        print_r($rows);

        foreach ($rows as $row) {
            echo '<tr>';
            echo "<td>{$row->id}</td>";
            echo "<td>{$row->name}</td>";
            echo "<td><a href=\"delete.php?del_id={$row->id}?>\" class=\"btn btn-danger\">delete</a></td>";
            echo '</tr>';


        }
        ?>


        </tbody>
    </table>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity=""
        crossorigin="anonymous"></script>
</html>
