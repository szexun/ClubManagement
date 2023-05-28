<?php
    include('db.php');

    // get the user's id from the URL
    $id = $_GET['id'];
    // sql query to delete fish's data from database based on user's id
    $sql_query = "DELETE FROM `club details` WHERE id ='$id'";
    // if sql query is executed successfully
    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Delete Successful')</script>";
        echo "<script>window.location.href = 'committeeViewAllClub.php' </script>";
    } else {
        echo "<script>alert('Delete Failed')</script>";
    }
?>