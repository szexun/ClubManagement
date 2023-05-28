<?php
    include('db.php');
    include('navbar.php');

    $club_id = $_GET['id'];

    $sql_query = "SELECT * FROM `club details` WHERE id = '$club_id'";  
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);  

    if(isset($_POST['btnUpdate'])){
        $clubName = $_POST['txtClubName'];
        $clubDescription = $_POST['txtDescription'];
        $clubPicture = $_POST['txtPicture'];
 
        $query = "UPDATE `club details` SET `club_name`='$clubName',`club_description`=\"$clubDescription\",`club_picture`='$clubPicture' WHERE id = $club_id ";
    
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Update Successful!')</script>";
            echo "<script>window.location.href = 'committeeViewAllClub.php'</script>";
        } else {
            echo "<script>alert('Update Failed!')</script>";
        }

    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/edit.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <title>SDP Website</title>
</head>

<body>
    <div>
        <h1>Edit Club Details</h1>
    </div>
    
    <div class="container">
        <div class="col-md-6">
            <label for="" class="form-label">Club ID: </label> <?php echo $row['id']?>
        </div>
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Club Name</label>
                <input type="text" class="form-control" name="txtClubName" value="<?php echo $row['club_name']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Club Description</label>
                <input type="text" class="form-control" name="txtDescription" value="<?php echo $row['club_description']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Club Picture(URL)</label>
                <input type="text" class="form-control" name="txtPicture" value="<?php echo $row['club_picture']?>">
                <img src="<?php echo $row['club_picture']?>" height="75px" width="75px" alt="">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update Details</button>
            </div>
        </form>
    </div>
