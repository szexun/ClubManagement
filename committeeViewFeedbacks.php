<?php
    include('db.php');
    include('navbar.php');

    // sql query to retrieve all event which haven't been approve
    $sql_query = "SELECT * FROM `feedbacks`";
    $result = mysqli_query($conn, $sql_query);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>SDP Website</title>
</head>

<body>

    <center>
        <h1 style="margin: 20px 0px">All Feedbacks</h1>
    </center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Feedback ID</th>
                <th>Feedback Content</th>
                <th>User Name</th>
                <th>Event Name</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['feedbackID']?></td>
                <td><?php echo $row['feedbackContent']?></td>
                <td><?php echo $row['userName']?></td>
                <td><?php echo $row['eventName']?></td>
                <td>
                    <a href="committeeDeleteFeedback.php?feedbackID=<?php echo $row['feedbackID'];?>">
                        <i><i class="fas fa-trash"></i></i>
                    </a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</body>

</html>