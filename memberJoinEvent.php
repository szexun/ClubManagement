<?php
    include('db.php');
    include('navbar.php');

    if(!isset($_SESSION)){
        session_start();
    }

    // get the user id and the club id
    $eventID = $_GET['eventID'];
    $userID = $_SESSION['id'];
    
    // echo "user id : " . $_SESSION['id'];
    // echo "event id : " . $eventID;

    // sql query to retrieve user data from the database
    $query_users = "SELECT * FROM `users` WHERE id = '$userID'";
    $result_users = mysqli_query($conn, $query_users);
    $row_users = mysqli_fetch_assoc($result_users);

    // echo $row_users['username'];
    // echo $row_users['email'];
    // echo $row_users['gender'];
    $participant_name = $row_users['username'];
    $participant_email = $row_users['email'];
    $participant_gender = $row_users['gender'];
    // echo $participant_name;
    // echo $participant_email;
    // echo $participant_gender;

        // sql query to retrieve club data from the database
        $query_event = "SELECT * FROM `event details` WHERE eventID = '$eventID'";
        $result_event = mysqli_query($conn, $query_event);
        $row_event = mysqli_fetch_assoc($result_event);
    
        // echo $row_club['club_name'];
        $event_name = $row_event['event_name'];
        $event_picture = $row_event['event_picture'];
        // echo $event_name;


    // sql query to insert 
     $sql_query = "INSERT INTO `event participants`(`participantName`, `participantEmail`, `participantGender`, `eventID`, `eventName`, `eventPicture`, `userID`) 
     VALUES ('$participant_name','$participant_email','$participant_gender','$eventID','$event_name','$event_picture','$userID')";
    

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Join Sucessful!')</script>";
        echo "<script>window.location.href = 'memberViewUpcomingEvents.php'</script>";
    } else {
        echo "<script>Join Failed</script>";
    }
?>