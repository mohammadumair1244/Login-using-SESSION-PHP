<?php


$con = mysqli_connect('localhost','root','','php-reg') or die('Unable To connect');
$emailfg=$_POST['emailfg'];
echo $emailfg;
echo "<br>";
$pa="SELECT password from `login_user` WHERE email='$emailfg'";
$result=mysqli_query($con,$pa);
$row=mysqli_fetch_assoc($result);
$mimp=$row['password'];
echo $mimp;
echo "<br>";

$to=$_POST['emailfg'];
$subject="Password Reset";
$message="Your Password is: ".$mimp;

$headers="From: mohammadumair1244@gmail.com";  

try { 
// mail($to,$subject,$message,$headers);
echo "Password Sent to your Email";
}
catch(Exception $e) {
echo 'Error Message: ' .$e->getMessage();
}
echo "<br><a href='login.php' ><button style='display:block;margin:auto' class='btn btn-success' >Login</button></a>";

?>

