<?php
    include('db.php');
    include('navbar.php');

    // get the club's id from the URL
    $id = $_GET['id'];

    // create select sql member details
    $sql_query = "SELECT * FROM `member list` WHERE member_id = '$id'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
    

    // create select sql for club details
    $club_name = $row['club_name'];
    $query_club = "SELECT * FROM `club details` WHERE club_name = '$club_name'";
    $result_club = mysqli_query($conn, $query_club);
    $row_club = mysqli_fetch_assoc($result_club);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/clubDetails.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="card" style="width: 18rem; margin-top: 30px;">
            <img src="<?php echo $row['club_picture']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h1><?php echo $row['club_name']?></h1><br>
                <p class="card-text">
                    <?php echo $row_club['club_description']?>
                </p>
            </div>
        </div>
    </center>
</body>

</html>