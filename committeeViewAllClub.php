<?php
    include('db.php');
    include('navbar.php');

    // start the session if it haven't been start
    if(!isset($_SESSION)){
        session_start();
    }

    // sql query to retrieve all data from the database
    $sql_query = "SELECT * FROM `club details`";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $sql_query);    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/committeeViewAllClub.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>

    <div>
        <h1>
            <center>All Clubs & Societies</center><br>
        </h1>
    </div>
    <div>
        <h3>
            <center><a href="committeeAddNewClub.php" class="btn btn-outline-secondary">Add New Club</a></center>
        </h3>
    </div>
    <?php 
        // store the rows of data in an associative array 
        while($row = mysqli_fetch_assoc($result)){ 
    ?>
    <div class="card column" style="width: 18rem;">
        <img src="<?php echo $row['club_picture']?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo $row['club_name'];?></h5><br>
            <a href="committeeViewClubDetails.php?id=<?php echo $row['id']?>" class="btn btn-primary">Check Details</a>
        </div>
    </div>
    <?php } ?>

</body>

</html>