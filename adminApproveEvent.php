<?php
    include('db.php');

    $eventID = $_GET['eventID'];
    $sql_query = "UPDATE `event details` SET `approval`='Approve' WHERE eventID = '$eventID'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Event Approve Successfully')</script>";
        echo "<script>window.location.href = 'adminViewUnapprovedEvent.php'</script>";
    } else {
        echo "Error Failed : " . mysqli_error($conn);
    }
?>