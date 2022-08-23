
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

if (isset($_POST['send'])){
$con = mysqli_connect('localhost','root','','php-reg') or die('Unable To connect');
$emailfg=$_POST['emailfg'];
echo "<br>";
$pa="SELECT password from `login_user` WHERE email='$emailfg'";
$result=mysqli_query($con,$pa);
$row=mysqli_fetch_assoc($result);
$mimp=$row['password'];
echo "<br>";

$to=$_POST['emailfg'];
$subject="Password Reset";
$message="Your Password is: ".$mimp;

$headers="From: mohammadumair1244@gmail.com";  

try { 
// mail($to,$subject,$message,$headers);
echo "<h3>Password Sent to your Email</h3>";
}
catch(Exception $e) {
echo 'Error Message: ' .$e->getMessage();
}
echo "<br><a href='login.php' ><button style='display:block;margin:auto' class='btn btn-success' >Login</button></a>";
}
?>
