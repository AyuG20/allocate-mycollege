<?php
include 'dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allo.css">
    <title>Document</title>
</head>
<body id="body">
    <?php include 'nav.php'?>
    <?php 
    $roll_n =$_SESSION['roll_n'];
    $sql = "SELECT * FROM `registration` WHERE `roll`='$roll_n'";
    $res = mysqli_query($con, $sql);
    $user_pass = mysqli_fetch_assoc($res);
    ?>
    <div class="roll-body">
        <div style="display:flex;">
            <img class="logo" src="logo.png" alt="image">
            <h3 id="form-title">National Exam of Engineering</h3>
        </div>
        <h4 style="margin-bottom: 30px;">Thankyou For registering Mr. <?php echo' '. $user_pass['firstname'].' '. $user_pass['lastname']?></h4>
        <h4 style="margin-bottom: 30px;">Your Roll No. is <?php echo' '.$_SESSION['roll_n'].'. '?></h4>
    </div>
</body>
</html>