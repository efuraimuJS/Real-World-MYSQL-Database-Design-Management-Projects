<?php
require "conn.php";
if (isset($_POST['submit'])) {
    $task = $_POST['inputTodos'];

    $insert = $conn->prepare('insert into tasks (name) values (:name);');
    $insert->execute([':name' => $task]);
    header('location: index.php');
}
?>
