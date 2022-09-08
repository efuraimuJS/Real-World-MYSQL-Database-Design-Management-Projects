<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php
    include_once 'components/head.html';
    ?>
</head>
<body>
<?php
include_once('components/header.php');

?>
<!--    container-fluid-->
<div id="main-para" style="padding-left: 7%; padding-right: 7%;">
    <h2><b>Welcome!</b></h2>
    <br>
    <ul>
        <li>Sign up</li>
        <li>or register as new user.</li>
    </ul>
    <br>

<!--    boxes-->
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <b>Users</b>
                    </h5>

                    <p class="card-text">View list of registered users</p>
                    <a href="display_user.php" class="btn btn-primary">Go</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <b>Register</b>
                    </h5>

                    <p class="card-text">Register as new user</p>
                    <a href="signup.php" class="btn btn-primary">Take me there</a>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>

</div>
<?php
include('components/footer.html');
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/egg.js/1.0/egg.min.js"
        integrity="sha512-tCSilflSXbmjMtEv9NTrhg32Lnv7zkoiiBa4QuKUvHeCEovI705gfG15UKyUCm2OZMLTahszyFyedeXbnbdXKg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">

</script>
</html>