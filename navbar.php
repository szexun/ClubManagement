<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>SDP Website</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <img src="images/logo.png" height="50px" width="70px" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Section Left -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Admin Navbar -->
                    <!-- Manage Users -->
                    <?php 
                        if($_SESSION['role'] == 0){
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="adminViewAllClub.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminViewUser.php">Users</a>
                    </li>
                    <!-- Manage Events Drop Down -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Events
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="adminViewApprovedEvent.php">Approved Events</a></li>
                            <li><a class="dropdown-item" href="adminViewUnapprovedEvent.php">Un Approved Events</a></li>
                            <li><a class="dropdown-item" href="adminViewUpcomingEvents.php">Upcoming Events</a></li>
                            <li><a class="dropdown-item" href="adminViewEventsHistory.php">Events History</a></li>
                        </ul>
                    </li>
                    <!-- End of Admin Navbar -->

                    <!-- Member Navbar -->
                    <?php
                     } else if ($_SESSION['role'] == 1) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="memberViewAllClub.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="memberViewUpcomingEvents.php">Events</a>
                    </li>

                    <!-- End of Member Navbar -->

                    <!-- Committee Navbar -->
                    <?php 
                        } else if($_SESSION['role'] == 2) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="committeeViewAllClub.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="committeeViewAllEvents.php">All Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="committeeViewFeedbacks.php">All Feedbacks</a>
                    </li>

                    <?php } ?>
                    <!-- End of Committee Navbar -->

                </ul>
                <!-- End of Section Left -->

                <!-- Section Right -->
                <ul class="navbar-nav">

                    <!-- Members Navbar -->
                    <?php if ($_SESSION['role'] == 1) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="memberViewMyClub.php">My Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="memberViewMyEvent.php">My Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myProfile.php">My Profile</a>
                    </li>
                    <?php } ?>
                    <!-- End of Members Navbar -->

                    <!-- Committee Navbar -->
                    <?php if ($_SESSION['role'] == 2) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Generate Report
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="clubReport.php">Clubs</a></li>
                            <li><a class="dropdown-item" href="memberReport.php">Members</a></li>
                            <li><a class="dropdown-item" href="eventReport.php">Events</a></li>
                            <li><a class="dropdown-item" href="participantReport.php">Participants</a></li>
                            <li><a class="dropdown-item" href="feedbackReport.php">Feedbacks</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- End of Committee Navbar -->

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>