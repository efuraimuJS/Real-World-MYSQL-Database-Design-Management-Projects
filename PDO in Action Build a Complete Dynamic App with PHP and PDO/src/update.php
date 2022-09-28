<?php
//session_start();

require "conn.php";

if (isset($_GET['upd_id']) && isset($_GET['task_bd'])) {
    $upd_id = $_GET['upd_id'];
    $task_bd = $_GET['task_bd'];

//    $_SESSION["task_bd"] = $task_bd;
//    $_SESSION["upd_id"] = $upd_id;

    setcookie('upd_id', $upd_id, time() + 86400);
    setcookie('task_bd', $task_bd, time() + 86400);

    header('location: update.php');

}
if (isset($_POST['submitUpd'])) {
    $submitUpd = $_POST['inputUpdateTodos'];

    $update = $conn->prepare('update tasks set name=:name where id=:id');
    $update->execute([':id' => $_COOKIE['upd_id'], ':name' => $submitUpd]);
    header('location: index.php');

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Todos</title>
</head>
<body>
<div class="container">
    <form method="post" action="update.php" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputUpdateTodos" class="sr-only"></label>
            <input name="inputUpdateTodos" type="text" class="form-control" id="inputUpdateTodos"
                   placeholder="<?php echo $_COOKIE['task_bd']; ?>">
        </div>
        <button name="submitUpd" type="submit" class="btn btn-primary mb-2">Update</button>
    </form>
</div>
</body>
</html>
