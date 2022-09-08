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

    }
}
?>