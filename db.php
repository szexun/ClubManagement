<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp website";

    //establish a connection to mysql server
    $conn = mysqli_connect($servername, $user, $password, $dbase);

    //check whether connection is successfully or not
    if(!$conn){
        die("Server Failed : " . mysqli_connect_error());
    } 
?>