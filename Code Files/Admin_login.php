<!DOCTYPE html>
<html>
<head>
	<title>Admin Login page1</title>
	<style>

		body {
		    background-repeat: no-repeat;
		    background-attachment: fixed; 
		    background-size: 100% 100%;
		}

		input[type=email], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
		  	box-sizing: border-box;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
		  	opacity: 0.8;
		}

		.cancelbtn {
		 	width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}


		.container {
			width: 1000px;
			margin-left: 150px;
		  	padding: 50px;
		}

		span.psw {
		    float: right;
		    padding-top: 16px;
		}

		.shadow{
			color:orange;
			text-shadow: 1px 1px 5px black;
			transition: transform .2s;
		  	margin: 0 auto;
		}

		.shadow:hover {
		    -webkit-transform: scale(2); /* Safari 3-8 */
		    transform: scale(2); 
		}

	</style>
</head>
<?php

session_start();

if($_POST['submit'])
{
	@$Email = $_POST['uemail'];
	@$password = $_POST['psw'];
	if($Email && $password)
	{
		@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
		@$query = mysqli_query($connect , " SELECT * FROM `admin` WHERE `Email`='$Email'");
		@$numrows = mysqli_num_rows($query);

		if(@$numrows != 0)
		{
			while(@$row = mysqli_fetch_assoc(@$query))
			{
				@$dbemail = $row['Email'];
				@$dbpassword = $row['password'];
			}
			if (@$dbemail == @$Email && @$dbpassword == @$password)
			{	
				$_SESSION['Email']=$dbemail;
				echo "Successfully login";
			}
			else
				echo "incorrect";

		}
		else
		{
			echo "the user doesn't exist <button><a href='login1.php'>Back</a></button>";	
			die();
		}		
	}
	else
	{
		die("please enter a username and password");		
	}

}

?>


<body style="background-image: url('admin_login.png')">

	<br><br><br><br><br>

	<center>
		<form action="Admin_login.php" method="POST">
		  <legend><center><h1 style="color: red;" class="shadow">Admin Login</h1></center></legend>
		  <table align="center" width="70%">
		  	
			  	<tr> <td> <label for="uemail"><b><br><br><br><br>Email</b></label> </td></tr>
			  	<tr> <td> <input type="email" placeholder="Enter Email" name="uemail" required></td></tr>

			  	<tr> <td> <label for="psw"><b>Password</b></label></td></tr>
			  	<tr> <td> <input type="password" placeholder="Enter Password" name="psw" required></td></tr>

			  	<tr> <td> <button type="submit" name="submit">Login</button> </td></tr>
			    <tr> <td> <label> <input type="checkbox" checked="checked" name="remember"> Remember me</label> </td></tr>
		  </table> <br>

		  <table align="center" width="70%" style="background-color:#f1f1f1">
		  		<tr> <td> <br> </td> </tr>
		  		<tr> 
		  			<td>
		  				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  				<button type="button" class="cancelbtn">Cancel</button> 
		  				<span class="psw">Forgot <a href="#">password?</a></span>
		  			</td>
		  		</tr>
		  		<tr> <td> <br> </td> </tr>
		  </table>
		</form>
	</center>

</body>
</html>
