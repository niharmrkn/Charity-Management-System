<!DOCTYPE html>
<html>
<head>
	<title>Donor Registration</title>
	<style>

		body {
		    background-repeat: no-repeat;
		    background-attachment: fixed; 
		    background-size: 100% 100%;
		}

		input[type=email], input[type=password], input[type=text], input[type=date] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
		  	box-sizing: border-box;
		}

		input[type=submit]{
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}
		input[type=submit]:hover{
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

<body style="background-image: url('donor_registration.png')">

	<br><br><br><br><br>

	<center>
		<form action="Donor_registration.php" method="POST">
		  <legend><center><h1 style="color: red;" class="shadow">Donor Registration</h1></center></legend>
		  <table align="center" width="70%">
		  	
			  	<tr> 
			  		<td> <label for="ufname"><b><br><br><br><br>First Name</b></label> </td>
			  		<td> <label for="ulname"><b><br><br><br><br>Last Name</b></label> </td>
			  	</tr>
			  	<tr> 
			  		<td> <input type="text" placeholder="Enter First Name" name="ufname" required></td>
			  		<td> <input type="text" placeholder="Enter Last Name" name="ulname" required></td>
			  	</tr>

			  	<tr> 
			  		<td> <label for="udob"><b>Date Of Birth</b></label> </td>
			  		<td> <label for="ucontactno"><b>Contact No.</b></label> </td>
			  	</tr>
			  	<tr> 
			  		<td> <input type="date" placeholder="Enter Date of Bith" name="udob" required></td>
			  		<td> <input type="text" placeholder="Enter Contact No." name="ucontactno" required></td>
			  	</tr>

			  	<tr> <td colspan="2"> <label for="uemail"><b>Email</b></label> </td></tr>
			  	<tr> <td colspan="2"> <input type="email" placeholder="Enter Email" name="uemail" required></td></tr>

			  	<tr> <td colspan="2"> <label for="psw"><b>Password</b></label></td></tr>
			  	<tr> <td colspan="2"> <input type="password" placeholder="Enter Password" name="psw" required></td></tr>

			  	<tr> <td colspan="2"> <input type="submit" name="submit" value="Submit"> </td></tr>
		  </table> <br>

		</form>
	</center>

</body>
</html>

<?php

@$submit = $_POST['submit'];
@$fname = strip_tags($_POST['ufname']);
@$lname = strip_tags($_POST['ulname']);
@$password = strip_tags($_POST['psw']);
@$contact = strip_tags($_POST['ucontactno']);
@$email = strip_tags($_POST['uemail']);
@$dob = $_POST['udob'];

if (@$submit)
{
	@$connect = mysqli_connect("localhost","root","","charity");

	@$namecheck = mysqli_query($connect,"SELECT `email` FROM `donor_reg` WHERE `email`='$email'");
	@$count = mysqli_num_rows($namecheck);
	if ($count !=0)
	{
		echo "you already Registered !";	
	}
	else
	{
		if ($fname && $lname && $password && $email && $contact && $dob)
		{
			if(strlen($fname)>50||strlen($lname)>50)
			{
				echo "firstname and lastname length is too much ";
			}
			else
			{
				if (strlen($password)>50||strlen($password)<6) 
				{
					echo "password must bein between 6 and 50 length ";
				}
				else
				{
					@$query = mysqli_query($connect,"
							INSERT INTO `donor_reg` (`Fname`, `Lname`,`DOB`,`contact`,`email`,`password`,`status`) VALUES ('$fname', '$lname', '$dob', '$contact' , '$email' , '$password')
								");

					echo "You have been successfully registered";
				}
			}
		}		
	}
}

?>


