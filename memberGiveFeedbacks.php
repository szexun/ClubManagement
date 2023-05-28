<?php
    include('db.php');
    include('navbar.php');

    if(!isset($_SESSION)){
        session_start();
    }
    $eventID = $_GET['eventID'];
    $userID = $_SESSION['id'];
    $userName = $_SESSION['username'];

    $sql_query = "SELECT * FROM `event details` WHERE eventID = '$eventID'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);

    $eventName = $row['event_name'];

    if(isset($_POST['btnSend'])){
        $feedbackContent = $_POST['txtFeedback'];
        $query_insert = "INSERT INTO `feedbacks`(`feedbackContent`, `userID`, `userName`, `eventID`, `eventName`) 
        VALUES ('$feedbackContent','$userID','$userName','$eventID','$eventName')";

        if(mysqli_query($conn, $query_insert)){
            echo "<script>alert('Feedback Sent Successfully!')</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            echo "<script>alert('Feedback Upload Failed')</script>";
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
        <h1>Feedbacks</h1>
    </div>
    
    <div class="container">
        <div class="col-md-6">
            <label for="" class="form-label">Event ID: </label> <?php echo $eventID?>
        </div>
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Event Name</label>
                <input type="text" class="form-control" name="txtEventName" value="<?php echo $row['event_name']?>" disabled>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Feedback Content</label>
                <input type="text" class="form-control" name="txtFeedback">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnSend">Send Feedback</button>
            </div>
        </form>
    </div>