<?php
  include('db.php');
  
  // start the session
  session_start();

  if(isset($_POST['login'])){
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];

    // sql query to retrieve users data from database
    $sql_query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $sql_query);
    // return row of data as an associative array
    $row = mysqli_fetch_assoc($result);
    // count the number of row return
    $count = mysqli_num_rows($result);

    // if the result is equal to 1
    if($count == 1){
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['user_role']; //

      echo "<script>window.location.href = 'mainpage.php'</script>";
    } else {
      echo "<script>alert('Account Unregistered!')</script>";
    }
  }
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
                    <h2 class="heading-section">Login Page</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Sign In</h3>
                        <form action="" method="post" class="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" name="txtEmail" id="txtEmail"
                                    placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded-left" name="txtPassword"
                                    id="txtPassword" placeholder="Password" required />
                                <button type="button" class="toggle" name="btnToggle" id="btnToggle">
                                    <i class="fa-solid fa-eye" id="eyeIcon" name="eyeIcon"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded" name="login"
                                    id="login">
                                    Login
                                </button>
                            </div>
                            <div class="form-group d-md-flex">

                                <div class="w-100 text-md-right">
                                Don't Have An Account ? <a href="signup.php"> Sign Up</a>
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