<?php

@$submit = $_POST['submit'];
@$fname = strip_tags($_POST['ufname']);
@$lname = strip_tags($_POST['ulname']);
@$password = strip_tags($_POST['psw']);
@$contact = strip_tags($_POST['ucontactno']);
@$email = strip_tags($_POST['uemail']);
@$dob = $_POST['udob'];

@$name2=$_FILES["Photo"]["name"];
//echo $name."<br>";
@$type2 = $_FILES["Photo"]["type"];
//echo $type."<br>";
@$size2 = $_FILES["Photo"]["size"];
//echo $size."<br>";
@$temp2 = $_FILES["Photo"]["tmp_name"];
//echo $temp."<br>";
@$error2 = $_FILES["Photo"]["error"];
//echo $error."<br>"


if (@$submit)
{
	@$connect = mysqli_connect("localhost","root","","charity");

	@$namecheck = mysqli_query($connect,"SELECT `email` FROM `donor_reg` WHERE `email`='$email'");
	@$count = mysqli_num_rows($namecheck);
	if ($count !=0)
	{
				echo '<script type="text/javascript">
						alert("you are already registered !");
						location="Donor_login.html";
						</script>';
	}
	else
	{
		if ($fname && $lname && $password && $email && $contact && $dob)
		{
			if(strlen($fname)>50||strlen($lname)>50)
			{
				echo '<script type="text/javascript">
						alert("firstname and lastname length is too much ");
						location="Donor_registration.html";
						</script>';

			}
			else
			{
				if (strlen($password)>50||strlen($password)<6) 
				{
				echo '<script type="text/javascript">
						alert("password must bein between 8 and 15 length ");
						location="Donor_registration.html";
						</script>';

				}
				else
				{
					if($error2 > 0)
					{
						echo '<script>alert("oops ! there is a peoblem in uploading photos......")</script>';
					}
					else
					{
						if ($type2 == "text/plain") {
							echo '<script>alert("Invalid format !..")</script>';
							
						}
						else{
							move_uploaded_file($temp2,"uploaded_Profile_donor/".$name2);
							
						}
					}

					@$query = mysqli_query($connect,"
							INSERT INTO `donor_reg` (`Fname`, `Lname`,`DOB`,`contact`,`email`,`password`,`status`,`profile`) VALUES ('$fname', '$lname', '$dob', '$contact' , '$email' , '$password','0','".$name2."')");

				echo '<script type="text/javascript">
						alert("You have been successfully registered")
						</script>';

					$to_email = $email;
					$subject = "Confirmation Mail";
					$body = "Hi".$fname.$lname.","."You have successfully registered to charity.com"." enjoy your journey with us";
					$headers = "From: niharmarkana5@gmail.com";

					if (mail($to_email, $subject, $body, $headers))
					{
						echo '<script type="text/javascript">
						alert("Email successfully sent ...");
						location="Donor_login.html";
						</script>';

					}
					else
					{
						echo "failed";
						// echo '<script type="text/javascript">
						// alert("Email sending failed...");
						// location="Donor_registration.html";
						// </script>';

					}
				}
			}
		}		
	}
}

?>



