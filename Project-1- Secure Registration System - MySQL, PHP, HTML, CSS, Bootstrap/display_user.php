<?php
require('components/connection.php');

$sql = "select first_name, last_name, email, gender, address from user_data order by email asc";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registered Users</title>
    <?php include 'components/head.html'; ?>
</head>
<body>
<?php include 'components/header.php' ?>
<br>
<div class="container">
    <div class="home_display">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><b>Registered Users</b></h3>
                    <hr/>
                    <div class="table-responsive"><br>
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            </thead>
                            <tbody>
                            <?php
                            $cnt = 1;
                            if ($query->rowCount() > 0) {

                                foreach ($results as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->first_name); ?></td>
                                        <td><?php echo htmlentities($result->last_name); ?></td>
                                        <td><?php echo htmlentities($result->email); ?></td>
                                        <td><?php echo htmlentities($result->gender); ?></td>
                                        <td><?php echo htmlentities($result->address); ?></td>
                                    </tr>
                                    <?php
                                    $cnt++;

                                }
                            } else {
                                echo '<strong>No results!</strong>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php include 'components/footer.html'; ?>
</body>
</html>
