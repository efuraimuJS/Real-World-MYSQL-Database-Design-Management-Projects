<?php
try {
    $host = 'localhost';
    $dbname = 'todo_db';
    $user = 'efuraimujs';
    $pass = 'root';

    $conn = new PDO('mysql:host=localhost;dbname=todo_db', $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    echo "error is: {$exception->getMessage()}";
}
