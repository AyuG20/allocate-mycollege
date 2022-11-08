<?php
include 'dbconnect.php';
session_start();
?>
<?php
if (isset($_POST['submit'])) {


    //$database = mysqli_select_db($con,$db); alternative way to create db instead of passing in mysqli_connect
    $showAlert = false;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mob = $_POST['mob'];
    $state =  $_POST['state'];
    $college1 = $_POST['college1'];
    $college2 = $_POST['college2'];
    $college3 =  $_POST['college3'];
    $password = $_POST['psword'];
    $cpsword =  $_POST['cpsword'];
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $cpass = password_hash($cpsword, PASSWORD_DEFAULT);

    if ($password === $cpsword) {
        $sql = "INSERT INTO `registration` (`firstname`, `lastname`, `mob`, `state`, `college_choice1`, `college_choice2`, `college_choice3`,`password`, `cpassword`) VALUES('$firstname','$lastname','$mob','$state',' $college1','$college2','$college3','$pass','$cpass')";

        $res = mysqli_query($con, $sql);
        if ($res) {
?>
            <script>
                alert("Registration Successfull");
            </script>
        <?php
        $sql = "SELECT * FROM `registration` WHERE `mob`='$mob'";
        $res = mysqli_query($con, $sql);
        $user_pass = mysqli_fetch_assoc($res);
        $_SESSION['roll_n'] = $user_pass['roll'];
        header("location:roll.php");
        } else {
        ?>
            <script>
                alert("Registration Not successfull");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Password Not matched");
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Exam of Engineering</title>

    <link rel="stylesheet" href="csspage.css">
</head>

<body id="body">
    <?php require 'nav.php' ?>
    <form class="signup" action="signup.php" method="post" enctype="multipart/form-data">

        <div style="display:flex;">
            <img class="logo" src="logo.png" alt="image">
            <h3 id="form-title">National Exam of Engineering</h3>
        </div>
        <label for="firstname ">Name</label>
        <input class="inpt" type="text" name="firstname" required id="firstname" placeholder="Enter First Name">
        <label for="lastname">Last Name</label>
        <input class="inpt" type="text" name="lastname" required id="lastname" placeholder="Enter Last Name">
        <label for="mob">Mobile no.</label>
        <input class="inpt" type="text" name="mob" required id="mob" placeholder="Enter Mobile No.">
        <label for="state">State</label>
        <select class="inpt" name="state" id="state" required>
            <option value="Maharashtra">Maharashtra</option>
            <option value="TamilNadu">Tamil Nadu</option>
            <option value="Delhi">Delhi</option>
            <option value="WestBengal">West Bengal</option>
        </select>
        <label for="college1">College Choice 1</label>
        <select class="inpt" name="college1" id="college1" required>
            <option value="Jadavpur University">Jadavpur University</option>
            <option value="Calcutta university Of Technology">Calcutta university Of Technology</option>
            <option value="Heritage Institute of Technology">Heritage Institute of Technology</option>
            <option value="Institute Of Engineering and Management">Institute Of Engineering and Management</option>
            <option value="Anna University">Anna University</option>
            <option value="SRM Institute">SRM Institute</option>
            <option value="Delhi Technical University">Delhi Technical University</option>
            <option value="Sardar patel College of Engineering">Sardar patel College of Engineering</option>
        </select>
        <label for="college2">College Choice 2</label>
        <select class="inpt" name="college2" id="college2" required>
            <option value="Jadavpur University">Jadavpur University</option>
            <option value="Calcutta university Of Technology">Calcutta university Of Technology</option>
            <option value="Heritage Institute of Technology">Heritage Institute of Technology</option>
            <option value="Institute Of Engineering and Management">Institute Of Engineering and Management</option>
            <option value="Anna University">Anna University</option>
            <option value="SRM Institute">SRM Institute</option>
            <option value="Delhi Technical University">Delhi Technical University</option>
            <option value="Sardar patel College of Engineering">Sardar patel College of Engineering</option>
        </select>
        <label for="college3">College Choice 3</label>
        <select class="inpt" name="college3" id="college3" aria-placeholder="select" required>
            <option value="Jadavpur University">Jadavpur University</option>
            <option value="Calcutta university Of Technology">Calcutta university Of Technology</option>
            <option value="Heritage Institute of Technology">Heritage Institute of Technology</option>
            <option value="Institute Of Engineering and Management">Institute Of Engineering and Management</option>
            <option value="Anna University">Anna University</option>
            <option value="SRM Institute">SRM Institute</option>
            <option value="Delhi Technical University">Delhi Technical University</option>
            <option value="Sardar patel College of Engineering">Sardar patel College of Engineering</option>
        </select>
        <label for="pass">Password</label>
        <input class="inpt" type="password" name="psword" required id="pass" placeholder="Enter Password">
        <label for="cpass">Confirm Password</label>
        <input class="inpt" type="password" name="cpsword" required id="cpass" placeholder="Re-enter Password">
        <!-- <div class="inpt">

                <input  type="file" name="image"> 
                <input type="submit" name="imgsubmit" value="Upload">
            </div> -->
        <button class="btn" type="submit" name="submit">Register For Counselling</button>

    </form>
    <footer class="foot">
        <a href="#">Copyright Policy</a> /
        <a href="#">Privacy Policy</a> /
        <a href="#">Terms and Conditions</a> /
        <a href="#">Help</a>
        <h2 style="font-size:20px ;">By Ayush Gupta</h2>
    </footer>
    </nav>
    <script>

    </script>
</body>

</html>