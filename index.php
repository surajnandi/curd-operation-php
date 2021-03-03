<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'student');

if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>CURD Operation System</h2><br>
        <h4><?php
            echo "Welcome " . $_SESSION['email'];
            ?></h4>


        <div class="text-center"><br>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>

    </div>

    <div class="container">

        <div class="text-center"><br><br><br><br><br>
            <a class="btn btn-success btn-lg" href="add.php">Add User</a><br><br><br>
            <a class="btn btn-success btn-lg" href="view.php">View User</a>

        </div>

    </div>
</body>

</html>