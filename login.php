<?php
session_start();
$message = "Enter Your Details";
if (count($_POST) > 0) {
    $con = mysqli_connect('localhost', 'root', '', 'php-reg') or die('Unable To connect');
    $result = mysqli_query($con, "SELECT * FROM login_user WHERE email='" . $_POST["email"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);

    if (is_array($row)) {

        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        $message = "Invalid Username or Password!";
    }
}

if (isset($_SESSION["id"])) {
    header("Location:main.php");
}

?>

<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <form class="form" name="frmUser" method="post" action="" align="center">
        <h3 align="center">Enter Login Details</h3>
        Email:<br>
        <input class="form-control col-lg-4 mx-auto" type="text" name="email">
        <br>
        Password:<br>
        <input class="form-control col-lg-4 mx-auto" type="password" name="password">
        <br><br>
        <input type="submit" class="btn btn-info" name="submit" value="Submit">
        <button class="btn btn-warning"><a href="forget.php" style="color: white;text-decoration:none">Forget Password</a></button>
        <br><br>
        <button class="btn btn-primary"><a href="createe.php" style="color: white;text-decoration:none">Not yet Registered? Click to Register</a></button>

        <br>

    </form>
    <div class="message"><?php if ($message != "") {
                                echo $message;
                            } ?></div>
</body>

</html>