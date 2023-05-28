<?php
    include('db.php');
    include('navbar.php');

    // sql query to retrieve all users' data from the database
    $club_id = $_GET['id'];

    $sql_query = "SELECT * FROM `member list` WHERE club_id = '$club_id'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $sql_query);
    
    $query_club_name = "SELECT * FROM `member list` WHERE club_id = '$club_id'";
    $result_club_name = mysqli_query($conn, $query_club_name);
    $row_club_name = mysqli_fetch_assoc($result_club_name);
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

    <!-- <form method="post" class="d-flex" role="search">
        <input class="form form-control me-2" type="search" name="txtSearch" placeholder="Search Username"
            aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="btnSearch">Search</button>
    </form> -->
    <center>
        <h1 style="margin: 20px 0px"><?php echo $row_club_name['club_name']?> Club Member</h1>
    </center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Member Email</th>
                <th>Member Gender</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['user_id']?></td>
                <td><?php echo $row['member_name']?></td>
                <td><?php echo $row['member_email']?></td>
                <td><?php echo $row['member_gender']?></td>
                <td>
                    <a href="committeeRemoveClubMember.php?id=<?php echo $row['member_id'];?>">
                        <i><i class="fas fa-trash"></i></i>
                    </a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</body>

</html>