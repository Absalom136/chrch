<?php 
	session_start();
//connect to database 
$link = mysqli_connect('localhost', 'root', '', 'employee');
if (isset($_POST['submit'])) {
	//add to the database
		$username = ($_POST['username']);
		$idno = ($_POST['cellphone']);
		$cellphone = ($_POST['email']);
		$residential = ($_POST['residential']);

	$result = mysqli_query($link, "INSERT INTO 2nd_registration (username, cellphone, email, residential) VALUES ('".$_POST['username']."', '".$_POST['cellphone']."', '".$_POST['email']."', '".$_POST['residential']."')") or die("Could not update!");
	

	$_SESSION['message'] = "Data entered successfully! Added $username to the database";
	$_SESSION['username'] = $username;
	header("location: bookinghome.php");//redirected to homepage
}else{
	$_SESSION['message'] = "Record Could not be added to the database";
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Members Registration</title>
	<link rel="stylesheet" type="text/css" href="absa3.css">
</head>
<body>
	<div class="header">
<h1>OGM Record Management System</h1>
</div>
<div class="login">
<h1>New Record:</h1>
<form method="POST" action="2ndsrvc_chrch_reg.php" enctype="multipart/form-data"> 
	
		<marquee behavior="alternate">Enter your details</marquee>
	
		<input type="text" name="username" required="required" placeholder="Name goes here">
		<input type="text" name="cellphone" required="required" placeholder="cellphone">
		<input type="email" name="email" placeholder="example@gmail.com">
		<input type="text" name="residential" required="required" placeholder="Residential">
        <input type="submit" name="submit" value="Send">
      <a href="2ndbookinghome.php" target="_blank" class="forgot">View Records</a>
      <div class="shadow"></div>
	</div>	
</form>

</body>
</html>