<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");

}
require 'components/connection.php';

if (isset($_POST['save'])) {
    if ($_POST['otpvalue'] == $_SESSION['otp']) {
        $sql = "insert into user_data(first_name, last_name, email, gender, address, password)
 values (:first_name, :last_name, :email, :gender, :address, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            ['first_name' => $_SESSION['first_name'],
                'last_name' => $_SESSION['last_name'],
                'email' => $_SESSION['email'],
                'gender' => $_SESSION['gender'],
                'address' => $_SESSION['address'],
                'password' => $_SESSION['password']]
        );
        session_unset();
        session_destroy();
        echo "<script>alsert('Registration Successful!')</script>";
        echo "<script>window.location.href = 'index.php
</script>";

    } else {
        echo "<script>alert('Invalid ORP');</script>";
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
<?php include 'components/header.php' ?>

<div class="container" style="height: auto;">
    <div class="signup_form">
        <h1>OTP</h1>
        <p>Check your mail for the OTP.</p>
        <form action="#" role="form" id="fileForm">
            <div class="form-group"><label for="name"><span class="req"> Enter OTP</span> </label>
                <input type="text" name="otpvalue" onkeyup="validate(this)" required class="form-control" id="user_otp">
            </div>
            <div class="form-group">
                <hr>
                <input type="submit" class="btn btn-success" name="save" value="Confirm">
            </div>
        </form>
    </div>

</div>
<?php include 'components/footer.html' ?>
</body>
<script src="js/signup_validation.js"></script>
</html>
