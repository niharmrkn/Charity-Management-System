<?php

session_start();

@$Email = $_POST['uemail'];
@$password = $_POST['psw'];
@$submit = $_POST['submit'];
if($submit)
{

	if(@$Email && @$password)
	{
		@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
		@$query = mysqli_query($connect , "SELECT * FROM `admin` WHERE `Email`='$Email'");
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
				echo '<script type="text/javascript">
						alert("successfully logged in");
						location="Admin_dashboard.php";
						</script>';
			}
			else
			{
				echo '<script type="text/javascript">
						alert("incorrect credential");
						location="Admin_login.html";
						</script>';
			}

		}
		else
		{
				echo '<script type="text/javascript">
						alert("the admin does not exist");
						location="Admin_login.html";
						</script>';
		}		
	}
	else
	{
		echo '<script>alert("please enter a username and password")</script>';		
	}
}

?>
