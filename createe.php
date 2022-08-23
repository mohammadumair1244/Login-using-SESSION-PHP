<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>

<body style="padding: 10px;">
    <form action="createe.php" method="post">
      <h3 style="text-align: center">Enter Information to get yourself Registered</h3>
      <br>
        <div class="form-group mx-auto" style="text-align: center">
          <label >Name</label>
          <input name="fname" type="text" class="form-control col-lg-4 mx-auto" id="fname"  placeholder="Enter  Name">
        </div>
          <div class="form-group" style="text-align: center">
            <label for="">Email </label>
            <input name="email" type="email" class="form-control col-lg-4 mx-auto" id="email"  placeholder="Enter Email">
          </div>
          <div class="form-group" style="text-align: center">
            <label for="">Age </label>
            <input name="age" type="text" class="form-control col-lg-4 mx-auto" id="age"  placeholder="Enter Age">
          </div>
        <div class="form-group" style="text-align: center">
          <label for="exampleInputPassword1">Password</label>
          <input name="pass" type="password" class="form-control col-lg-4 mx-auto" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button style="display:block;margin:auto" type="submit" class="btn btn-primary">Submit</button>
      </form>
      
      <?php
              $con = mysqli_connect('localhost','root','','php-reg') or die('Unable To connect');

      
if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['pass'])) {

  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $age=$_POST['age'];
  $pass=$_POST['pass'];
  $con = mysqli_connect('localhost','root','','php-reg') or die('Unable To connect');
  $chk= "SELECT * FROM `login_user` WHERE email='$email'";

  $result = mysqli_query($con,$chk);
  $row_cnt = mysqli_num_rows($result);
  if ($row_cnt === 0) {

    $sql=" INSERT INTO `login_user` (`name`, `email`, `age`, `password`) VALUES ('$fname', '$email', '$age', '$pass')";
  
    if (mysqli_query($con, $sql)) {
      echo "User Registered successfully";
      echo "<br><a href='login.php' ><button style='display:block;margin:auto' class='btn btn-success' >Login</button></a>";
    }
    else 
   {
    echo "Error Adding user: " . $sql . "<br>" . mysqli_error($con);
   }
 // header('Location: create.php');
  }
  else{
    echo "Email already Exists";
    echo "<br><a href='login.php' ><button style='display:block;margin:auto' class='btn btn-success' >Login</button></a>";

  }
   
}
mysqli_close($con);

  
      ?>
<style>
  a:hover{
    text-decoration: none;
  }
</style>
<br><br><br><br>
<a href="index.php" style="color: white;" ><button class="btn btn-block btn-primary">Main Menu</button></a>
  </body>
</html>