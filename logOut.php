<?php
    // start session
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    
    
    echo "<script>window.location.href = 'index.php'</script>";
?>