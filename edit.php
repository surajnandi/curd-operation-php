<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User Details</title>
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
        <h4>Edit User Details</h4>

        <div class="text-center"><br>
            <a class="btn btn-primary" href="index.php">Back to Home</a>
        </div>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'student');
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];

            $select = "SELECT * FROM user WHERE id='$edit_id'";
            $sql = mysqli_query($conn, $select);
            $row = mysqli_fetch_array($sql);

            $fullname = $row['fullname'];
            $username = $row['username'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_image = $row['user_image'];
            $user_details = $row['user_details'];
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="full name">Full Name:</label>
                <input type="text" class="form-control" value="<?php echo $fullname; ?>" name="fullname" placeholder="Enter full name">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" value="<?php echo $username; ?>" name="username" placeholder="Enter username">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label for="img">Upload Image:</label>
                <input type="file" class="form-control" name="user_image" placeholder="Upload image">
            </div>

            <div class="form-group">
                <label for="details">Details:</label>
                <textarea class="form-control" name="user_details" placeholder="Enter message"><?php echo $user_details; ?> </textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-primary" href="view.php">View User</a>
            </div>
        </form>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'student');

        if (isset($_POST['submit'])) {

            $efullname = $_POST['fullname'];
            $eusername = $_POST['username'];
            $euser_email = $_POST['user_email'];
            $euser_password = $_POST['user_password'];
            $eimage = $_FILES['user_image']['name'];
            $eimage_tmp = $_FILES['user_image']['tmp_name'];
            $euser_details = $_POST['user_details'];

            if (empty($eimage)) {
                $eimage = $user_image;
            }

            $update = "UPDATE user SET fullname='$efullname',username='$eusername',user_email='$euser_email',user_password='$euser_password',user_image='$eimage',user_details='$euser_details' WHERE id='$edit_id'";

            $sql = mysqli_query($conn, $update);

            if ($sql === true) {
                echo "data updated";
                move_uploaded_file($eimage_tmp, "upload_image/$eimage");
            } else {
                echo "failed";
            }
        }


        ?>



    </div>

</body>

</html>