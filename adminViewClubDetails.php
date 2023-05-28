<?php
    include('db.php');
    include('navbar.php');

    // get the fish's id from the URL
    $id = $_GET['id'];

    // create select sql
    $sql_query = "SELECT * FROM `club details` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
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
                    <?php echo $row['club_description']. "<br>"?>

                <div class="d-grid gap-2">
                    <a href="adminEditClubDetails.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit Club</a>
                    <a href="adminDeleteClubDetails.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete
                        Club</a>
                </div>
                </p>
            </div>
        </div>
    </center>
</body>

</html>