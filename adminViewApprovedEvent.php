<?php
    include('db.php');
    include('navbar.php');

    // sql query to retrieve all event which haven't been approve
    $sql_query = "SELECT * FROM `event details` WHERE approval = 'Approve'";
    $result = mysqli_query($conn, $sql_query);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/allClub.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div>
        <h1>
            <center>Approved Events</center><br>
        </h1>
    </div>
    <?php 
        // store the rows of data in an associative array 
        while($row = mysqli_fetch_assoc($result)){ 
    ?>
    <div class="card column" style="width: 18rem;">
        <img src="<?php echo $row['event_picture']?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo $row['event_name'];?></h5><br>
            <p class="card-text"><?php echo $row['event_description']?></p>
        </div>
    </div>
    
</body>

</html>
<?php } ?>