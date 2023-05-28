<?php
    include('db.php');

    $eventID = $_GET['eventID'];
    $sql_query = "DELETE FROM `event details` WHERE eventID = '$eventID'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>window.location.href = 'committeeViewAllEvents.php' </script>";
    } else {
        echo "<script>alert('Delete Failed')</script>";
    }

?>