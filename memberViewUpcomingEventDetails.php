<?php
    include('db.php');
    include('navbar.php');

    $eventID = $_GET['eventID'];
    $sql_query = "SELECT * FROM `event details` WHERE eventID = '$eventID'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/eventDetails.css">
    <title>SDP Website</title>
</head>

<body>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo $row['event_picture']?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['event_name']?></h5>
                    <p class="card-text"><?php echo $row['event_description']?></p>
                    <p class="card-text">Date: <?php echo $row['event_date']?></p>
                    <p class="card-text">Venue: <?php echo $row['event_venue']?></p>
                    <p class="card-text"><small class="text-muted">Organized by: <?php echo $row['club_name']?> Club</small></p>
                    <br>
                    <a href="memberJoinEvent.php?eventID=<?php echo $row['eventID']?>" class="btn btn-primary">Join Event</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>