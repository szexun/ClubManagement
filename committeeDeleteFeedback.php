<?php
    include('db.php');
    
    $feedbackID = $_GET['feedbackID'];
    $sql_query = "DELETE FROM `feedbacks` WHERE feedbackID = '$feedbackID'";
    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.location.href = 'committeeViewFeedbacks.php'</script>";
    } else {
        echo "<script>alert('Delete Failed')</script>";
    }
?>