<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<style>
			input{
				margin:5px;
			}
			p,h2{
				color: white;
			}
			#sign{
				background-color: rgba(250, 0, 0, 0.8);
				height: 350px;
				width: 230px;
				text-align: center;				
				margin: auto;
			}
		</style>
	</head>
	<body>
		<h1></h1>
		<div id="sign">
		<h2>Signup</h2>
		<form method="POST">
			<input type="text" name="name" placeholder="Enter Name" required><br>
			<input type="text" name="email" placeholder="Enter email" required><br>
			<input type="text" name="phno" placeholder="Enter phone number" pattern="[0-9]{10}" title="Must contain 10 numbers!!" required><br>
			<input type="text" id="pw" name="pass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
			<input type="text" id="pass2" name="repass" placeholder="Re-Enter Password" required><br>
			<input type="submit" name="submit" value="submit" class="btn btn-primary"  onclick="validate()">
			<p>Already a member,<a href="index.php">Login here</a></p>
		</form>
		</div>
		<script type="text/javascript">
			function validate(){
				var pww = document.getElementById("pw");
				var ll=pww.value.length;
				pww.onkeyup = function() {
					if(ll >= 8) {
						length.classList.remove("invalid");
						length.classList.add("valid");
					} 
					else {
						length.classList.remove("valid");
						length.classList.add("invalid");
					}
				}
			}

		</script>
	</body>
</html>
<?php
require "conn.php";
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$mail=$_POST['email'];
	$pass=$_POST['pass'];
	$rpass=$_POST['repass'];
	if($pass==$rpass){
	$sql="INSERT INTO user (name,email,phno,password) VALUES ('$name','$mail','$phno','$pass')";

	if(mysqli_query($conn,$sql)){
	    echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='index.php';</script>";
	}
	else{
	    echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='signup.php';</script>";
	}
	}
	else{
	    echo"<script type='text/javascript'>window.alert('Password Does Not Match,Please Try Again');window.location='signup.php';</script>";
	}
}

?>