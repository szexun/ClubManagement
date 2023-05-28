<?php
    include('db.php');

    $member_id = $_GET['id'];
    $sql_query = "DELETE FROM `member list` WHERE member_id = '$member_id'";

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Remove From the Club Successfully!')</script>";
        echo "<script>history.go(-1)</script>";
    } else {
        echo "<scriot>alert('Remove Failed')</script>";
    }
?>