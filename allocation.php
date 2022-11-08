<?php
include 'dbconnect.php';

session_start();

if (!isset($_SESSION['rollno'])) {
    header("location:index.php");
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body">
    <?php require 'nav.php';?>
    <?php
    $roll = $_SESSION['rollno'];
    $sql = "SELECT * FROM `registration` WHERE `roll`=$roll";
    $rank_sql = "SELECT * FROM `ranks` WHERE `ranks`.roll=$roll";
    $res = mysqli_query($con, $sql);
    $res2 = mysqli_query($con, $rank_sql);
    $user_pass = mysqli_fetch_assoc($res);
    $user_pass2 = mysqli_fetch_assoc($res2);
    $_SESSION['rank'] = $user_pass2['rank'];
    $_SESSION['fn'] = $user_pass['firstname'];
    $_SESSION['ln'] = $user_pass['lastname'];
    $_SESSION['rolln'] = $user_pass['roll'];
    $_SESSION['col1'] = $user_pass['college_choice1'];
    $_SESSION['col2'] = $user_pass['college_choice2'];
    $_SESSION['col3'] = $user_pass['college_choice3'];
    ?>
    <div class="card">
        <div style="display:flex;">
            <img class="logo" src="logo.png" alt="image">
            <h3 id="form-title">National Exam of Engineering</h3>
        </div>
        <h3 style="margin-bottom: 10px;">ALLOTMENT PAGE</h3>
        <?php
        echo ' <div class="rank-body"> ROLL:  ' . $_SESSION['rolln'] . '<div>';
        echo ' <div class="rank-body"> NAME:  ' . $_SESSION['fn'] . ' ' . $_SESSION['ln'] . '<div>';
        echo ' <div class="rank-body"> RANK:  ' . $_SESSION['rank'] . '<div>';
        if ($_SESSION['rank'] < 100) {
            echo ' <div class="rank-body"> COLLEGE ALLOCATED:  ' . $_SESSION['col1'] . '<div>';
        } elseif ($_SESSION['rank'] < 300) {
            echo ' <div class="rank-body"> COLLEGE ALLOCATED: ' . $_SESSION['col2'] . '<div>';
        } elseif ($_SESSION['rank'] < 700) {
            echo ' <div class="rank-body"> COLLEGE ALLOCATED:  ' . $_SESSION['col3'] . '<div>';
        } 
        else {
            echo "NO COLLEGE ALLOCATED";
        }
        ?>
        <a href="logout.php"><button type="submit" name="submit" class="button">Logout</button></a>
        <button onclick="window.print()" name="submit" id="prnt-btn">Print Page</button>
    </div>

    <footer class="foot">
        <a href="">Copyright Policy</a> /
        <a href="">Privacy Policy</a> /
        <a href="">Terms and Conditions</a> /
        <a href="">Help</a>
        <h2 style="font-size:20px ;">By Ayush Gupta</h2>
    </footer>
</body>

</html>