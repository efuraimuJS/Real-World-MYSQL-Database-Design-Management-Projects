<!doctype html>
<html lang="en">
<head>
    <?php
    include 'components/head.html';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/signup.css" type="text/css">


</head>
<body>

<?php
$pagename = 'SIGN UP';
require 'components/connection.php';
require 'phpmailer/mail.php';
session_start();

$msg = "";
if (isset($_POST['submit'])) {
    //Remove all illegal characters from mail
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    //Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $msg = 'Invalid email address entered!';
    } else if (trim($_POST['password']) !== trim($_POST['confirm_password'])) {
        $msg = 'Passwords must match!';
    } else {
        $_SESSION['first_name'] = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
        $_SESSION['last_name'] = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = filter_var(trim($_POST['gender']), FILTER_SANITIZE_STRING);
        $_SESSION['address'] = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
        $_SESSION['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $result = 0;

        //check if user is already registered or not

        $sql = "select count(*) from user_data where email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute($_SESSION['email']);
        $result = $stmt->fetchColumn();

        if ($result > 0) {
            $msg = 'User already exists!';
        } else {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $result1 = sendOTP($_SESSION['email'], $otp);

            //$result1 =1;
            if ($result1 == 1) {
                $sql = "select count(*) from registration where email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_SESSION['email']]);
                $result2 = $stmt->fetch();


                if ($result2 > 0) {
                    //update if user has previously sent otp
                    $sql = "update registration set otp=:otp where email =:email";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['otp' => $otp, 'email' => $_SESSION['email']]);

                    echo "<script> alert('OTP sent to your email.');</script>";
                    header("Location: otp.php");
                } else {
                    $sql = "insert into registration (otp, emil) values(:otp, :email)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['otp' => $$otp, 'email' => $_SESSION['email']]);

                    echo "<script>alert('OTP sent to your email.')</script>";
                    header("Location");

                }
            } else {
                echo "<script>alsert('OTP send failed!')</script>";
            }

        }
    }
    $conn = null;
}

?>


<div><?php
    include 'components/head.html'
    ?></div>
<div class="container">
    <div class="signup-form">
        <div style="text-align: center;">
            <h2>New User Registration</h2>
        </div>
        <strong><span class="loginMsg"><?php
                echo @$msg;
                ?></span></strong>
        <hr>
        <form action="#" method="post" id="fileForm" role="form">
            <div class="form-group">

                <label for="first_name">
                    <span class="req"></span>First Name:
                </label>
                <input type="text" class="form-control"
                       name="first_name" id="first_name"
                       required placeholder="Your first name"/>
            </div>
            <div class="form-group">

                <label for="last_name">
                    <span class="req"></span>Last Name:
                </label>
                <input type="text" class="form-control"
                       name="last_name" id="last_name"
                       required placeholder="Your last name"/>
            </div>
            <div class="form-group">

                <label for="email">
                    <span class="req"></span>Eamil Address:
                </label>
                <input type="text" class="form-control"
                       name="email" id="email"
                       required placeholder="Your email address"/>
                <div class="status" id="status"></div>
            </div>
            <div class="form-group">

                <label for="category">
                    <span class="req"></span>Gender:
                </label>
                <select name="gender" id="gender" class="form-select">
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

            </div>

            <div class="form-group">

                <label for="email">
                    <span class="req"></span>Eamil Address:
                </label>
                <input type="text" class="form-control"
                       name="email" id="email"
                       required placeholder="Your email address"/>
                <div class="status" id="status"></div>
            </div>

            <div class="form-group">
                <label for="password"><span class="req"></span> Password: </label>
                <input required type="text" name="password" class="form-control inputpass"
                       minlength="4" maxlength="16" id="pass1"
                       placeholder="Must be between 4-16 charachters"/>

                <label for="confirm_password"><span class="req"></span> Confirm Password: </label>
                <input required type="password" name="confirm_password" class="form-control inputpass"
                       minlength="4" maxlength="16" placeholder="Re-enter to validate" id="pass2"
                       onkeyup="checkpass(); return false;"
                />
                <span id="confirmMessage" class="confirmMessage"></span>
            </div>
            <div class="form-group">
                <hr>
                <input type="submit" class="btn btn-success" name="submit" id="submit">
            </div>
        </form>
    </div>
</div>

<?php
include 'components/footer.html';
?>

<script type="text/javascript">
    function checkPass() {
        //store the passw field object into variables...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');

        //store the confirmation message object...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using.
        var green = '#bdffdb'
        var red = '#c46a6a'
        //compare the value in the passW field
        if (pass1.value === pass2.value) {
            pass2.style.backgroundColor = green;
            message.style.color = '#178511'
            message.innerHTML = 'Passwords match.'

        } else {
            pass2.style.backgroundColor = red;
            message.style.color = '#85112e'
            mesage.innerHTML = 'Passwords do not match!'
        }
    }
</script>
</body>
</html>