<?php
    include('db.php');

    // get the user id from the URL
    $id = $_GET['id'];
    // sql query to delete specific user data from the database
    $sql_query = "DELETE FROM `users` WHERE id='$id'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Delete Successful!')</script>";
        echo "<script>window.location.href = 'adminViewUser.php'</script>";
    } else {
        echo "<script>alert('Delete Failed')</script>";
        echo "<script>window.location.href = 'adminViewUser.php'</script>";
    }
?>