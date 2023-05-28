<?php
  include('db.php');

  // check whether the Register button has been cliked or not
  if(isset($_POST['btnRegister'])){
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $confirmPassword = $_POST['txtConfirmPassword'];
    $username = $_POST['txtUsername'];
    $gender = $_POST['ddGender'];

    // sql query to insert into database
    $sql_query = "INSERT INTO `users`(`username`, `password`, `email`, `gender`) VALUES ('$username','$password','$email','$gender')";

    // create select query
    $query = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if($password == $confirmPassword){ //check the password and confirm password is same or not
      if($count == 0){ //check the email is registered or not
        // if sql query is executed successfully
        if(mysqli_query($conn, $sql_query)){
          echo "<script>alert('Register Successful!')</script>";
          echo "<script>window.location.href = 'index.php'</script>";
        } else {
          echo "Server Failed : " . mysqli_error($conn);
        }
      } else {
        echo "<script>alert('Email Registered!')</script>";
      }
    } else {
      echo "<script>alert('Password and Confirm Password Not Same!')</script>";
      echo "<script>history.go(-1)</script>";
    }
  }
  // close the previous open database connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SDP Website</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sign Up Page</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Sign Up</h3>
                        <form action="" method="post" class="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" name="txtEmail" id="txtEmail"
                                    placeholder="Email" required />
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control rounded-left" name="txtPassword"
                                    id="txtPassword" placeholder="Password" required />
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control rounded-left" name="txtConfirmPassword"
                                    id="txtConfirmPassword" placeholder="Confirm Password" required />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="txtUsername" id="txtUsername"
                                    placeholder="Username" required />
                            </div>

                            <div class="form-group">
                                <select name="ddGender" id="ddGender" class="form-control rounded-left" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="btnRegister" id="btnRegister"
                                    class="form-control btn btn-primary rounded">
                                    Register
                                </button>
                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-right">
                                    Already Had An Account ? <a href="index.php">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="script/script.js"></script>
</body>

</html>