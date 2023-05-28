<?php
    include('db.php');
    include('navbar.php');

    $club_id = $_GET['id'];

    // sql query to retrieve specific club data from the database
    $query_club = "SELECT * FROM `club details` WHERE id = '$club_id'";
    $result_club = mysqli_query($conn, $query_club);
    $row = mysqli_fetch_assoc($result_club);

    $club_name = $row['club_name'];
    // if the create event button has been clicked
    if(isset($_POST['btnCreate'])){
        $eventName = $_POST['txtEventName'];
        $eventDate = $_POST['txtEventDate'];
        $eventDesciption = $_POST['txtEventDescription'];
        $eventPicture = $_POST['txtEventPicture'];
        $eventVenue = $_POST['txtEventVenue'];

        echo $eventName . "<br>";
        echo $eventDate . "<br>";
        echo $eventDesciption . "<br>";
        echo $eventPicture . "<br>";
        echo $eventVenue . "<br>";
        echo $row['club_name'];

        // sql query to insert data into database
        $query_insert = "INSERT INTO `event details`(`event_name`, `event_picture`, `event_description`, `event_venue`, `event_date`, `club_name`) 
        VALUES ('$eventName','$eventPicture','$eventDesciption','$eventVenue','$eventDate','$club_name')";

        if(mysqli_query($conn, $query_insert)){
            echo "<script>alert('Event Created Successfully')</script>";
            echo "<script>window.location.href = 'committeeViewAllClub.php'</script>";
        } else {
            echo "Error Failed : " . mysqli_error($conn);
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
        <h1>Create New Event</h1>
    </div>
    
    <div class="container">
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Event Name</label>
                <input type="text" class="form-control" name="txtEventName" placeholder="Event Name">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Event Date</label>
                <input type="datetime-local" class="form-control" name="txtEventDate" placeholder="Event Name">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Event Description</label>
                <input type="text" class="form-control" name="txtEventDescription" placeholder="Event Description">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Event Picture(URL)</label>
                <input type="text" class="form-control" name="txtEventPicture" placeholder="Event Picture (URL)">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Event Venue</label>
                <input type="text" class="form-control" name="txtEventVenue" placeholder="Event Venue">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnCreate">Create Event</button>
            </div>
        </form>
    </div>
