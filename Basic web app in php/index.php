<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<style>
			.rishi{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h2 class="rishi"><br>Test Task by RISHI RAJ G</h2><br>
		<div style="background-color: rgba(250, 0, 0, 0.8);height: 260px;width: 210px;text-align: center;align-content: center;margin: auto">

			<h2 style="color: white;">Login</h2>
			<form method="POST">
				<input type="text" name="name" placeholder="Enter Username" style="margin: 15px;"><br>
				<input type="password" name="pass" placeholder="Enter Password" style="margin: 15px;"><br>
				<input type="submit" name="submit" value="submit"  class="btn btn-primary">
				<p style="color:white"><br>Not a member,<a href="signup.php">Register here</a></p>
			</form>

		</div>
	</body>
</html>
<?php
require "conn.php";
session_start();
if(isset($_POST['submit']))
{
	$uname=$_POST['name'];
	$password=$_POST['pass'];
	$sql="select * from user where name='".$uname."'AND password='".$password."'limit 1";
	
	$result=$conn->query($sql);
	$_SESSION["name"] = $uname;
	if($result->num_rows==1){
	    $url="view.php";
	    header('location:'.$url);
	}
	else{
	    echo"<script type='text/javascript'>window.alert('Invalid Username or Password');window.location='index.php';</script>";
	}
}

?>