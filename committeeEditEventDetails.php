<?php
    include('db.php');
    include('navbar.php');

    $eventID = $_GET['eventID'];
    $sql_query = "SELECT * FROM `event details` WHERE eventID = '$eventID'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
    $time = $row['event_date'];

    if(isset($_POST['btnUpdate'])){
        $eventName = $_POST['txtEventName'];
        $eventDescription = $_POST['txtEventDescription'];
        $eventVenue = $_POST['txtEventVenue'];
        $eventDate = $_POST['txtEventDate'];
        $eventPicture = $_POST['txtEventPicture'];
        $clubName = $row['club_name'];

        $query_update = "UPDATE `event details` SET `event_name`='$eventName',`event_picture`='$eventPicture',
        `event_description`=\"$eventDescription\",`event_venue`='$eventVenue',
        `event_date`='$eventDate',`club_name`='$clubName' WHERE eventID = '$eventID'";

        if(mysqli_query($conn, $query_update)){
            echo "<script>alert('Update Successful!')</script>";
            echo "<script>window.location.href = 'committeeViewAllEvents.php'</script>";
        } else {
            echo "<script>alert('Update Failed!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/edit.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <title>SDP Website</title>
</head>

<body>
    <div>
        <h1>Edit Event Details</h1>
    </div>
    
    <div class="container">
    <div class="col-md-6">
            <label for="" class="form-label">Organized By: </label> <?php echo $row['club_name']?>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Event ID: </label> <?php echo $row['eventID']?>
        </div>
        <form class="row g-3" action="" method="post">
            
            <div class="col-12">
            <label for="inputEmail4" class="form-label">Event Name</label>
                <input type="text" class="form-control" name="txtEventName" value="<?php echo $row['event_name']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Event Description</label>
                <input type="text" class="form-control" name="txtEventDescription" value="<?php echo $row['event_description']?>">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Event Venue</label>
                <input type="text" class="form-control" name="txtEventVenue" value="<?php echo $row['event_venue']?>">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Event Date</label>
                <input type="datetime-local" class="form-control" name="txtEventDate" value="<?php echo date('Y-m-d\TH:i:s', strtotime($time)); ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Event Picture(URL)</label>
                <input type="text" class="form-control" name="txtEventPicture" value="<?php echo $row['event_picture']?>">
                <img src="<?php echo $row['event_picture']?>" height="75px" width="75px" alt="">
            </div>
           
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update Details</button>
            </div>
        </form>
    </div>
