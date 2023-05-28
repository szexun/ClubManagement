<?php
    include('db.php');
    include('navbar.php');

    // sql query to retrieve all users' data from the database
    $sql_query = "SELECT * FROM `users`";
    // store the sql query result in a variable
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

    <form method="post" class="d-flex" role="search">
        <input class="form form-control me-2" type="search" name="txtSearch" placeholder="Search Username"
            aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="btnSearch">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Gender</th>
                <th>User Role</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            <?php 
                if(isset($_POST['btnSearch'])){
                    $search = $_POST['txtSearch'];
            
                    $sql_query1 = "SELECT * FROM `users` WHERE username LIKE '%$search%'";
                    $result1 = mysqli_query($conn, $sql_query1);
                    $count1 = mysqli_num_rows($result1);

                    if($count1 > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
            ?>
            <tr>
                <td><?php echo $row1['id']?></td>
                <td><?php echo $row1['username']?></td>
                <td><?php echo $row1['password']?></td>
                <td><?php echo $row1['email']?></td>
                <td><?php echo $row1['gender']?></td>
                <td><?php echo $row1['user_role']?></td>
                <td><a href="adminEditUser.php?id=<?php echo $row1['id'];?>">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    |
                    <a href="adminDeleteUser.php?id=<?php echo $row1['id'];?>">
                        <i><i class="fas fa-trash"></i></i>
                    </a>
                </td>

            </tr>
            <?php
                        }
                    } 
                } else {
                    while($row = mysqli_fetch_assoc($result)){ 
                ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['user_role']?></td>
                <td><a href="adminEditUser.php?id=<?php echo $row['id'];?>">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    |
                    <a href="adminDeleteUser.php?id=<?php echo $row['id'];?>">
                        <i><i class="fas fa-trash"></i></i>
                    </a>
                </td>

            </tr>
            <?php } }?>
        </tbody>
    </table>
</body>

</html>