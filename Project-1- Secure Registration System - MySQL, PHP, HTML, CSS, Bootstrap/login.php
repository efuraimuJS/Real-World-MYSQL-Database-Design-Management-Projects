<?php $pagename = 'Login'; ?>

<?php include("components/connection.php");
session_start();

if (isset($_SESSION['sess_id'])) {
    header('location: dashboard.php');

}
?>

<?php
$msg = "";
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email != "" && $password != "") {

        try {
            $sql = "select * from `user_data` where `email` = :email";
            $query = $conn->prepare($sql);
            $query->execute([":email" => $email]);
            $count = $query->rowCount();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($count == 1 && !empty($row)) {
                // check if the user exists
                if (password_verify($_POST['password'], $row['password'])) {
                    session_start();
                    $_SESSION['sess_id'] = $row['user_id'];
                    $_SESSION['sess_email'] = $row['email'];

                    $msg = "Successful Login";
                    header('Location: dashboard.php');
                    exit();

                } else {
                    $msg = "Incorrect password!";
                }
            } else {
                $msg = "Incorrect credentials!";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        $msg = "Both field are required!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'components/head.html' ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/signup.css">

</head>
<body>
<div><?php include 'components/header.php' ?></div>
<div class="container">
    <div class="signup-form">
        <div style="text-align: center;">
            <h2>User Login</h2>
        </div>
        <strong><span class="loginMsg"><?php echo @$msg ?></span></strong>
        <hr>
        <form action="#" role="form" id="fileForm">

            <div class="form-group">
                <label for="email"><span class="req"></span>Email Address</label>
                <input type="text" name="email" required placeholder="your email id" class="form-control" id="email">
            </div>
            <div class="form-group">
                <hr>
                <input type="submit" class="btn btn-success" name="login" id="submit">
            </div>
        </form>
    </div>
</div>

<?php include 'components/footer.html' ?>
</body>
<script src="js/signup_validation.js"></script>
</html>

