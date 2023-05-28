<?php
    include('db.php');
    include('navbar.php');

    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['role'] == 0){
        echo "<script>window.location.href = 'adminViewAllClub.php'</script>";
    } else if ($_SESSION['role'] == 1){
        echo "<script>window.location.href = 'memberViewAllClub.php'</script>";
    } else if ($_SESSION['role'] == 2){
        echo "<script>window.location.href = 'committeeViewAllClub.php'</script>";
    }
?>