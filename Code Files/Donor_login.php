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
		@$query = mysqli_query($connect , "SELECT * FROM `donor_reg` WHERE `email`='$Email'");
		@$numrows = mysqli_num_rows($query);

		if(@$numrows != 0)
		{
			while(@$row = mysqli_fetch_assoc(@$query))
			{
				@$dbemail = $row['email'];
				@$dbpassword = $row['password'];
				@$dbfname =  $row['Fname'];
				@$dblname = $row['Lname'];
				@$dbdob = $row['DOB'];
				@$dbcontact = $row['contact'];
			}
			if (@$dbemail == @$Email && @$dbpassword == @$password)
			{	
				$_SESSION['Fname']=$dbfname;
				$_SESSION['Lname']=$dblname;
				$_SESSION['email']=$dbemail;
				$_SESSION['DOB']=$dbdob;
				$_SESSION['contact']=$dbcontact;
				echo '<script type="text/javascript">
						alert("successfully logged in");
						location="Donor_dashboard.php";
						</script>';
			}
			else
			{
				echo '<script type="text/javascript">
						alert("incorrect credential");
						location="Donor_login.html";
						</script>';
			}

		}
		else
		{
				echo '<script type="text/javascript">
						alert("the admin does not exist");
						location="Donor_login.html";
						</script>';

		}		
	}
	else
	{
		echo '<script>alert("please enter a username and password")</script>';		
	}

}

?>
