<?php
    include('db.php');
    include('navbar.php');

    if(!isset($_SESSION)){
        session_start();
    }

    // get the user id and the club id
    $club_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    
    echo "user id : " . $_SESSION['id'];
    echo "club id : " . $club_id;

    // sql query to retrieve user data from the database
    $query_users = "SELECT * FROM `users` WHERE id = '$user_id'";
    $result_users = mysqli_query($conn, $query_users);
    $row_users = mysqli_fetch_assoc($result_users);

    // echo $row_users['username'];
    // echo $row_users['email'];
    // echo $row_users['gender'];
    $member_name = $row_users['username'];
    $member_email = $row_users['email'];
    $member_gender = $row_users['gender'];
    // echo $member_name;
    // echo $member_email;
    // echo $member_gender;

    // sql query to retrieve club data from the database
    $query_club = "SELECT * FROM `club details` WHERE id = '$club_id'";
    $result_club = mysqli_query($conn, $query_club);
    $row_club = mysqli_fetch_assoc($result_club);

    // echo $row_club['club_name'];
    $club_name = $row_club['club_name'];
    $club_picture = $row_club['club_picture'];
    // echo $club_name;

    // sql query to insert 
    $sql_query = "INSERT INTO `member list`(`member_name`, `member_email`, `member_gender`, `user_id`, `club_id`, `club_name`, `club_picture`) 
    VALUES ('$member_name','$member_email','$member_gender','$user_id','$club_id','$club_name', '$club_picture')";
    

    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Join Sucessful!')</script>";
        echo "<script>window.location.href = 'memberViewAllClub.php'</script>";
    } else {
        echo "<script>Join Failed</script>";
    }
?>