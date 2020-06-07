<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<style>
			h3{
				font-size: 20px;
			}
			#add{

				margin-top: 3%;
				float: left;
				margin-left: 7%;
				text-align: center;
			}
			#delete{
				float: right;
				margin-top: 3%;
				margin-right: 50%;
				text-align: center;
			}
			th{
				color:red;
			}
			input{
				margin-bottom: 3px;
				background-color: skyblue;
			}
			body{
				background-color: skyblue;
			}

			
		</style>
	</head>
	<body>
		<?php 
		session_start();
		if (!isset($_SESSION["name"])) {
		header('location: index.php');
		}?>
		<div class="container-fluid" style="margin: 5px;">
		<?php
		echo "<h3>Welcome  ";
		echo $_SESSION["name"];
		?>
		</div>
		<form method="POST"><button value="Log Out" name="logout" style="float:right;margin-right: 5%;" class="btn btn-outline-danger">Log Out</button></form>
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				//unset($_SESSION['name']);
				header("location: index.php");
			}
		?>
		<div class="container-fluid">
		<h2>People Details</h2>
		<table border="0">
			<tr>
			<th><h3>Name</th>			
			<th><h3>Phone Number</th>
			<th><h3>Email</th>
			<th><h3>Address</th>
			<th><h3>Website</h3></th><br>
			<th><h3>Update</h3></th>
			</tr>
			<?php
				require "conn.php";
				$sql="select * from detail";
				$result=$conn->query($sql);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
				echo"<tr>
				<form method='POST'>
				<td><input type='text' name='name' value='".$row["name"]."' style='border:none;'  required></td>
				<td><input type='text' name='phno' value='".$row["phno"]."' style='border:none;' required pattern='[0-9]{10}'' title='Must contain 10 numbers!!'></td>
				<td><input type='text' name='email' value='".$row["email"]."' size='20' style='border:none;' required></td>
				<td><input type='text' name='addr' value='".$row["addr"]."' size='45' style='border:none;' required></td>
				<td><input type='text' name='link' id='link' value='".$row["link"]."' size='30' style='border:none;' required></td>
				<td><input type='submit' name='update' value='Edit' class='btn btn-warning btn-sm' onclick='validate()'></td>
				</form>
				</tr>";
				}
				echo"</table>";
				}
			?>
		</table>
	</div>




		<div id='add'>
		<h2>Add People</h2>
		<form method="POST">
			<input type="text" name="name" placeholder="Enter Name" required><br>			
			<input type="text" name="phno" placeholder="Enter phone number" pattern="[0-9]{10}" title="Must contain 10 numbers!!" required><br>
			<input type="email" name="email" placeholder="Enter email" required><br>
			<input type="text" name="addr" placeholder="Enter Address" required><br>
			<input type="text" name="link" placeholder="Enter Website link" required><br>
			<input type="submit" name="add" value="add" class="btn btn-success" required>
		</form>
		</div>
		<?php
			require "conn.php";
			if(isset($_POST['add']))
			{
				$name=$_POST['name'];
				$phno=$_POST['phno'];
				$mail=$_POST['email'];
				$addr=$_POST['addr'];
				$link=$_POST['link'];
				$sql="INSERT INTO detail (name,phno,email,addr,link) VALUES ('$name','$phno','$mail','$addr','$link')";

				if(mysqli_query($conn,$sql)){
				    echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='view.php';</script>";
				}
				else{
				    echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='view.php';</script>";
				}
				
			}

		?>



		<?php
			require "conn.php";
			if(isset($_POST['update']))
			{
				$name=$_POST['name'];
				$phno=$_POST['phno'];
				$mail=$_POST['email'];
				$addr=$_POST['addr'];
				$link=$_POST['link'];
				echo $phno;
				$sql="UPDATE detail set name='$name' ,phno='$phno',email='$mail',addr='$addr',link='$link' where name='$name'";

				if(mysqli_query($conn,$sql)){
				    echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='view.php';</script>";
				}
				else{
				    //echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='view.php';</script>";
				    echo $conn->error;
				}
			}
			

		?>
		<div id='delete'>
		<h2>Delete</h2>
		<form method="POST">
			<input type="text" name="name" placeholder="Enter Name" required><br>
			<input type="submit" name="delete" value="delete" class="btn btn-danger">
		</form>
		</div>
		<?php
			if(isset($_POST['delete']))
			{
				$name=$_POST['name'];

				$sql="delete from detail where name='$name'";

				if(mysqli_query($conn,$sql)){
				    echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='view.php';</script>";
				}
				else{
				    echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='view.php';</script>";
				}
				
			}
		?>
<script type="text/javascript">
	function validate(){
		/*var pww = document.getElementById("link");
		
		pww.onkeyup = function() {
			if() {
				length.classList.remove("invalid");
				length.classList.add("valid");
			} 
			else {
				length.classList.remove("valid");
				length.classList.add("invalid");
			}
		}*/
		var emailID = document.getElementById("link");
         atpos = emailID.indexOf(".");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
			length.classList.remove("invalid");
			length.classList.add("valid");
         }
         else{
         	length.classList.remove("valid");
			length.classList.add("invalid");
         }
	}
</script>
	</body>
</html>
