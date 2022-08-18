<?php
session_start();
?>
<html>
<head>
<title>User Logged In</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-dark">

<?php
if($_SESSION["name"]) {
?>
<h3 style="color: green;text-align:center">Welcome <?php echo $_SESSION["name"]; ?> </h3>.<button class="btn btn-danger" ><a style="color: white;text-decoration:none" href="logout.php" tite="Logout">Click here to Logout. </button>
<?php
}else echo "<h1 style='color: red;text-align:center'> Please login first .</h1>";
?>
</body>
</html>
