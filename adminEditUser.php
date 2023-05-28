<?php
    include('db.php');
    include('navbar.php');

    // get the user id from the URL
    $id = $_GET['id'];

    // sql query to retrieve specific user data from the database
    $sql_query = "SELECT * FROM `users` WHERE id = '$id'";
    // store sql query result in a variable
    $result = mysqli_query($conn, $sql_query);
    // store the row of result as an associative array in a variable
    $row = mysqli_fetch_assoc($result);

    // if the update record button has been clicked
    if(isset($_POST['updateRecord'])){
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $email = $_POST['txtEmail'];
        $role = $_POST['txtUserRole'];
        $gender = $_POST['ddGender'];
        
        // sql query to update information in database
        $sql_query = "UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email',
        `gender`='$gender',`user_role`='$role' WHERE id = '$id'";

        if(mysqli_query($conn, $sql_query)){
            echo "<script>alert('Update Successful!')</script>";
            echo "<script>window.location.href = 'adminViewUser.php'</script>";
        } else {
            echo "<script>alert('Update Failed!')</script>";;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>SDP Website</title>
</head>
<body>
<div>
        <h1>Edit User Profile</h1>
    </div>
    <div class="container">
        <div class="col-md-6">
            <label for="" class="form-label">ID: </label> <?php echo $row['id']?>
        </div>
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtUsername" value="<?php echo $row['username']?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="text" class="form-control" name="txtPassword" value="<?php echo $row['password']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="txtEmail" value="<?php echo $row['email']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">User Role</label>
                <input type="text" class="form-control" name="txtUserRole" value="<?php echo $row['user_role']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Gender</label>
                <select name="ddGender" id="" class="form-control">
                    <option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="updateRecord">Update Record</button>
            </div>
        </form>
    </div>
</body>
</html>