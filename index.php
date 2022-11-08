<?php
include 'dbconnect.php';
session_start();
?>

<?php
$showerror = false;
if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `registration` WHERE `roll`='$roll'";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);
    if ($num) {
        $user_pass = mysqli_fetch_assoc($res);
        $db_pass = $user_pass['password'];
        $pass_decode = password_verify($password, $db_pass);
        if ($pass_decode) {
            $_SESSION['rollno'] = $roll;
            header("location:allocation.php");
        } 
        else {
            $showerror = "Invalid Credentials";
        }
    }
    else {
        $showerror = "Invalid Credentials";
    }
   
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csspage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body">
    <?php require 'nav.php' ?>

<form class="login" action="index.php" method="post">

<div style="display:flex;">
    <img class="logo" src="logo.png" alt="image">
    <h3 id="form-title">National Exam of Engineering</h3>
</div>
<label for="roll">Enter Your Roll Number</label>
<input class="inpt" type="text" name="roll" required id="roll" placeholder="Enter Roll No.">

<label for="pass">Password</label>
<input class="inpt" type="password" required name="password" id="pass" placeholder="Enter Password">
<div>
    <input type="checkbox" id="showpaswd" name="disppwd" style="margin: 10px 0px;" onclick="showPassword()">
    Show Password
</div>
<button class="btn" type="submit" name="submit">Login</button>
<a href="signup.php" style="text-decoration:None; color:black;">New User?</a>
<?php
if ($showerror) {
    echo '<div class=error>Error! ' . $showerror . '</div>';
}
?>
</form>

   

    <footer class="foot">
        <a href="">Copyright Policy</a> /
        <a href="">Privacy Policy</a> /
        <a href="">Terms and Conditions</a> /
        <a href="">Help</a>
        <h2 style="font-size:20px ;">By Ayush Gupta</h2>
    </footer>

    <script>
        function showPassword() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>