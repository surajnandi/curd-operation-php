<!DOCTYPE html>
<html lang="en">

<head>
    <title>View User Details</title>
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
        <h4>View User Details</h4><br>

        <div class="text-center">
            <a class="btn btn-primary" href="index.php">Back to Home</a>
        </div><br>


        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'student');
        if (isset($_GET['del'])) {
            $del_id = $_GET['del'];
            $delete = "DELETE FROM user WHERE id='$del_id'";
            $run_delete = mysqli_query($conn, $delete);
            if ($run_delete === true) {
                echo "Record has been deleted";
            } else {
                echo "Faild: Try again leter";
            }
        }


        ?>



        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'student');
                $select = "SELECT * FROM user";
                $sql = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($sql)) {

                    $user_id = $row['id'];
                    $fullname = $row['fullname'];
                    $username = $row['username'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];
                    $user_image = $row['user_image'];
                    $user_details = $row['user_details'];

                ?>
                    <tr>
                        <td><?php echo $user_id; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $user_email; ?></td>
                        <td><?php echo $user_password; ?></td>
                        <td><img src="upload_image/<?php echo $user_image; ?>" height="70px"></td>
                        <td><?php echo $user_details; ?></td>
                        <td><a class="btn btn-danger" href="view.php?del=<?php echo $user_id; ?>">Delete</a></td>
                        <td><a class="btn btn-success" href="edit.php?edit=<?php echo $user_id; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>