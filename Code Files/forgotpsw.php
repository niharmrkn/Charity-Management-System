<?php

session_start();

@$Email = $_POST['uemail'];
@$npsw = $_POST['psw'];
@$submit = $_POST['submit'];
@$submit1 = $_POST['submit1'];
@$submit2 = $_POST['submit2'];

if ($submit)
{
	@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
	@$query = mysqli_query($connect , "SELECT `Email` FROM `admin` WHERE `Email`='$Email'");
	@$numrows = mysqli_num_rows($query);

	if(@$numrows != 0)
	{
		@$query1 = mysqli_query($connect , "UPDATE `admin` SET `password` = '$npsw' WHERE `admin`.`Email` = '$Email'");
		echo '<script type="text/javascript">
				alert("Password Reset Sucessfully!");
				location="Admin_login.html";
				</script>';

	}
	else
	{
		echo '<script type="text/javascript">
				alert("You are not registered admin!");
				location="Admin_login.html";
				</script>';
	}
}

if ($submit1)
{
	@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
	@$query2 = mysqli_query($connect , "SELECT `email` FROM `donor_reg` WHERE `email`='$Email'");
	@$numrows2 = mysqli_num_rows($query2);

	if(@$numrows2 != 0)
	{
		@$query2 = mysqli_query($connect , "UPDATE `donor_reg` SET `password` = '$npsw' WHERE `donor_reg`.`email` = '$Email'");
		echo '<script type="text/javascript">
				alert("Password Reset Sucessfully!");
				location="Donor_login.html";
				</script>';

	}
	else
	{
		echo '<script type="text/javascript">
				alert("You are not registered Donor!");
				location="forgotpse_donor.html";
				</script>';
	}
}

if ($submit2)
{
	@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
	@$query3 = mysqli_query($connect , "SELECT `email` FROM `ngo_details` WHERE `email`='$Email'");
	@$numrows3 = mysqli_num_rows($query3);

	if(@$numrows3 != 0)
	{
		@$query3 = mysqli_query($connect , "UPDATE `ngo_details` SET `password` = '$npsw' WHERE `ngo_details`.`email` = '$Email'");
		echo '<script type="text/javascript">
				alert("Password Reset Sucessfully!");
				location="NGO_login.html";
				</script>';

	}
	else
	{
		echo '<script type="text/javascript">
				alert("You are not registered Donor!");
				location="forgotpsw_NGO.html";
				</script>';
	}
}

?>