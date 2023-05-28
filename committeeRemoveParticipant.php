<?php
    include('db.php');

    $participantID = $_GET['participantID'];
    $sql_query = "DELETE FROM `event participants` WHERE participantID = '$participantID'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Remove Successful')</script>";
        echo "<script>window.location.href = 'committeeViewAllEvents.php' </script>";
    } else {
        echo "<script>alert('Remove Failed')</script>";
    }
?>
