<?php
    include('db.php');
    include('navbar.php');

    $eventID = $_GET['eventID'];
    // sql query to retrieve all users' data from the database
    $sql_query = "SELECT * FROM `event participants` WHERE eventID = '$eventID'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $sql_query);
    $event_name = mysqli_query($conn, $sql_query);
    $event_result = mysqli_fetch_assoc($event_name);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>SDP Website</title>
</head>

<body>
    <center>
        <h1 style="padding-top: 10px; margin-left: 50px;
    margin-bottom: 35px;"><?php echo $event_result['eventName']?> Participant List</h1>
    </center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Participant ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){ 
            ?>
            <tr>
                <td><?php echo $row['participantID']?></td>
                <td><?php echo $row['participantName']?></td>
                <td><?php echo $row['participantEmail']?></td>
                <td><?php echo $row['participantGender']?></td>
                <td>
                    <a href="committeeRemoveParticipant.php?participantID=<?php echo $row['participantID'];?>">
                        <i><i class="fas fa-trash"></i></i>
                    </a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</body>

</html>