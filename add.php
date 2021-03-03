<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>CURD Operation</h2><br>
        <h4>Add User Details</h4>
        <div class="text-center"><br>
            <a class="btn btn-primary" href="index.php">Back to Home</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="full name">Full Name:</label>
                <input type="text" class="form-control" name="fullname" placeholder="Enter full name">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="user_email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="user_password" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label for="img">Upload Image:</label>
                <input type="file" class="form-control" name="user_image" placeholder="Upload image">
            </div>

            <div class="form-group">
                <label for="details">Details:</label>
                <textarea class="form-control" name="user_details" placeholder="Enter message"></textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary active btn-block">Submit</button>
            </div>
        </form>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'student');

        // if (mysqli_connect_errno()) {
        //     echo "connection fail";
        // } else {
        //     echo "connection ok";
        // }
        if (isset($_POST['submit'])) {

            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $image = $_FILES['user_image']['name'];
            $image_tmp = $_FILES['user_image']['tmp_name'];
            $user_details = $_POST['user_details'];

            $insert = "INSERT INTO user (fullname,username,user_email,user_password,user_image,user_details) VALUES ('$fullname','$username','$user_email','$user_password','$image','$user_details')";

            $sql = mysqli_query($conn, $insert);

            if ($sql === true) {
                echo "data inserted";
                move_uploaded_file($image_tmp, "upload_image/$image");
            } else {
                echo "failed";
            }
        }


        ?>



    </div>

</body>

</html>