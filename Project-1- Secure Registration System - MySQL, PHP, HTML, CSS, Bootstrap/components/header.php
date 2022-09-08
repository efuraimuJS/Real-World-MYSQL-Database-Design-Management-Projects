<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <title>Document</title>-->
</head>
<body>
<!--heading block-->
<div class="container-fluid" id="headings">
    <h1>
        <strong>
            User Registration System
        </strong>
    </h1>
    <h3 style="color: #1e1f1f;">Sample Project</h3>
</div>

<!--navigation bar-->
<nav class="nav navbar-expand-lg navbar-light"
     style="background-image: linear-gradient(-225deg, #ebf7ff 0%,#f2f2f2, #f9fff0 100%);">

    <div class="container-fluid">
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">

            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link active" aria-current="page">
                        <b>Homepage</b>
                    </a>
                </li>
                <li class="nav-item"><a href="../display_user.php" class="nav-link"><b>Registered users</b></a></li>
                <li class="nav-item"><a href="../about.php" class="nav-link"><b>About</b></a></li>
            </ul>
            <li class="d-flex"><a href="../login.php">
                    <button class="btn btn-outline-success me-2" type="submit">Login</button>
                </a></li>
            <li class="d-flex"><a href="../signup.php">
                    <button class="btn btn-outline-success me-2" type="submit">Register</button>
                </a></li>
        </div>
    </div>
</body>

</html>