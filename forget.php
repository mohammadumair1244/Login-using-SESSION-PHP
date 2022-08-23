<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="padding: 15px;" class="col-lg-4 mx-auto">
    <h2>Forgot Password</h2>
    <form class="mx-auto" method="POST" action="">
        Enter Your Email Address: <input type="email" class="form-control" name="emailfg"><br>
        <input type="submit" class="btn btn-info mx-auto" name="send" value="Submit">
    </form>
</body>

</html>

<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_POST['send'])) {
    $con = mysqli_connect('localhost', 'root', '', 'php-reg') or die('Unable To connect');
    $emailfg = $_POST['emailfg'];
    $_SESSION['emailfg'] = $emailfg;
    echo "<br>";

    $code = rand(111111, 999999);

    $_SESSION['session_otp'] = $code;

    $to = $_POST['emailfg'];
    $subject = "Password Reset";
    $message = "Your Verification Code is: " . "<br><br><br>" . $code . "<br><br>"
        . "Enter it on you Forget Password Screen";


    try {

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mohammadumair1244@gmail.com';
        $mail->Password = 'xrvltxmxcpjyicda';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('mohammadumair1244@gmail.com');
        $mail->addAddress($to);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        // $mail->send();

        echo "<h3>Mail Sent</h3>";
    } catch (Exception $e) {

        echo 'Error Message: ' . $e->getMessage();
    }

?>
    <form method="POST" action="" class="mx-auto">
        Enter Verification Code E-Mailed to you:<input type="text" class="form-control" name="verifcode"><br>
        <input type="submit" class="btn btn-info mx-auto" name="verifsend" value="Submit">
    </form>
    <?php
    echo $code;
    echo "<br>";
}

if (isset($_POST['verifsend'])) {

    if ($_POST['verifcode'] == $_SESSION['session_otp']) {
        echo "<h4>Code Matched</h4>";
        echo "<h3>Enter Your New Password</h3>";
    ?>
        <form method="POST" action="" class="mx-auto">
            New Password: <input type="text" class="form-control" name="newpass"><br>
            Confirm Password: <input type="text" class="form-control" name="confpass"><br>
            <input type="submit" class="btn btn-info mx-auto" name="newsend" value="Submit">
        </form>
<?php
    } else {
        echo "<h1>CODE NOT SAME</h1>";
    }
}


if (isset($_POST['newsend'])) {
    $newpassword = $_POST['confpass'];
    if ($_POST['newpass'] == $_POST['confpass']) {
        $con = mysqli_connect('localhost', 'root', '', 'php-reg') or die('Unable To connect');
        $newpass = "UPDATE `login_user` SET password='$newpassword' WHERE email='$_SESSION[emailfg]'";
        mysqli_query($con, $newpass);
        echo "Password Changed";
        echo "<br><a href='login.php' ><button style='display:block;margin:auto' class='btn btn-success' >Login</button></a>";
    } else {
        echo "Password not match";
    }
}

?>