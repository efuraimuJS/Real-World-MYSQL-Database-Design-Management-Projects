<?php
session_start();
if (!isset($_SESSION['sess_id'])) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
          integrity="sha256-BAg/zs3Z4ZsqzR4Ac0N6oHyY0jDwGY1/H9RwqyIP72Q="
          crossorigin="anonymous">
</head>
<body>
<center>
    <div class="container">
        <h1>You are now logged in!</h1>
        <a href="logout.php">
            <button class="btn btn-outline-success">Logout</button>
        </a></div>

</center>
</body>
</html>
