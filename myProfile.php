<?php
    include('db.php');
    include('navbar.php');

    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $id = $_SESSION['id'];
    // sql query to retrieve user's data from the database based on the user's id
    $sql_query = "SELECT * FROM users WHERE id = '$id'";
    // store the result of sql query in a variable
    $result = mysqli_query($conn, $sql_query);
    // fetch a row of data as an associative array
    $row = mysqli_fetch_assoc($result); 

    if(isset($_POST['updateProfile'])){
        $username = $_POST['txtUsername'];
        $email = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];
        $gender = $_POST['ddGender'];
        echo $username;
        echo $email;
        echo $password;
        echo $gender;
        $query = "UPDATE `users` SET `username`='$username',`password`='$password',
        `email`='$email',`gender`='$gender' WHERE id = '$id'";
        
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Update Successful!')</script>";
            echo "<script>window.location.href = 'myProfile.php'</script>";
        }

        mysqli_close($conn);
    } 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/myProfile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <title>SDP Website</title>
</head>

<body>
    <form action="" method="post">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                            class="font-weight-bold">Welcome To Your Profile Page!</span><span class="text-black-50">You
                            May
                            Edit Your Personal Details Here!</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">My Profile</h4>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Username</label><input type="text"
                                    class="form-control" name="txtUsername" id="txtUsername"
                                    value="<?php echo $row['username']?>" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                    class="form-control" name="txtEmail" id="txtEmail"
                                    value="<?php echo $row['email']?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Gender</label>
                                <select name="ddGender" id="ddGender" class="form-control">
                                    <option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                Security</span>
                        </div><br>
                        <div class="col-md-12"><label class="labels">Password</label>
                            <input type="text" class="form-control" name="txtPassword" id="txtPassword"
                                value="<?php echo $row['password']?>">
                        </div>
                        <br><br><br><br><br><br>

                        <button type="submit" name="updateProfile" value="Update Profile"
                            class="btn btn-outline-primary">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>