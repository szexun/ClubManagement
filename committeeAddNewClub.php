<?php
    include('db.php');
    include('navbar.php');

    if(isset($_POST['btnAdd'])){
        $clubName = $_POST['txtClubName'];
        $clubDescription = $_POST['txtDescription'];
        $clubPicture = $_POST['txtPicture'];
 
        $query = "INSERT INTO `club details`(`club_name`, `club_description`, `club_picture`) 
        VALUES ('$clubName',\"$clubDescription\",'$clubPicture')";
    
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Add Successful!')</script>";
            echo "<script>window.location.href = 'committeeViewAllClub.php'</script>";
        } else {
            echo "<script>alert('Add Failed!')</script>";
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
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Club Name</label>
                <input type="text" class="form-control" name="txtClubName" placeholder="Club Name">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Club Description</label>
                <input type="text" class="form-control" name="txtDescription" placeholder="Club Description">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Club Picture(URL)</label>
                <input type="text" class="form-control" name="txtPicture" placeholder="Club Picture (URL)">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnAdd">Add Club</button>
            </div>
        </form>
    </div>
