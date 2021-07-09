
<?php

	
	
@$submit=$_POST['submit'];
@$name1=$_POST['ufname'];
@$type=$_POST['ulname'];
@$email=$_POST['udob'];
@$contact_ngo=$_POST['ucontactno'];
@$person_name=$_POST['uCname'];
@$contact_person=$_POST['uCno'];
@$description=$_POST['Des'];
@$address=$_POST['Address'];
@$bank_account_no=$_POST['ACCNO'];
@$upi_id=$_POST['UPI'];
@$password=$_POST['psw'];

@$trending=0;
@$approve=0;

@$name2=$_FILES["GID"]["name"];
//echo $name."<br>";
@$type2 = $_FILES["GID"]["type"];
//echo $type."<br>";
@$size2 = $_FILES["GID"]["size"];
//echo $size."<br>";
@$temp2 = $_FILES["GID"]["tmp_name"];
//echo $temp."<br>";
@$error2 = $_FILES["GID"]["error"];
//echo $error."<br>"

@$name3=$_FILES["Photo"]["name"];
//echo $name."<br>";
@$type3 = $_FILES["Photo"]["type"];
//echo $type."<br>";
@$size3 = $_FILES["Photo"]["size"];
//echo $size."<br>";
@$temp3 = $_FILES["Photo"]["tmp_name"];
//echo $temp."<br>";
@$error3 = $_FILES["Photo"]["error"];
//echo $error."<br>"


if($submit)
{
	@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
	@$namecheck = mysqli_query($connect,"SELECT `email` FROM `ngo_details` WHERE `email`='$email'");
	@$count = mysqli_num_rows($namecheck);
	if ($count !=0)
	{
				echo '<script type="text/javascript">
						alert("you are already registered !");
						location="NGO_login.html";
						</script>';
	}
	else
	{
		if ($name1 && $password && $email)
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
					@$query = mysqli_query($connect,"
							INSERT INTO `ngo_details` (`email`, `name`, `type`, `contact_ngo`, `person_name`, `contact_PERSON`, `description`, `address`, `bank_account_no`, `upi_id`, `password`, `trending`, `approve`) VALUES ('$email', '$name1', '$type', '$contact_ngo', '$person_name', '$contact_person', '$description', '$address', '$bank_account_no', '$upi_id', '$password', '$trending', '$approve')");
							if($error2 > 0)
							{
								echo '<script>alert("oops ! there is a peoblem in uploading GID......")</script>';
							}
							else
							{
								if ($type2 != "application/pdf") {
									echo '<script>alert("Invalid format !..")</script>';
								}
								else{
								move_uploaded_file($temp2,"uploaded_docs/".$name2);
								}
							}

							if($error3 > 0)
							{
								echo '<script>alert("oops ! there is a peoblem in uploading photos......")</script>';
							}
							else
							{
								if ($type3 != "image/jpeg") {
									echo '<script>alert("Invalid format !..")</script>';
								}
								else{
								move_uploaded_file($temp3,"uploaded_photos/".$name3);
								}
							}
							$qu1=mysqli_query($connect,"INSERT INTO ngo_files(email,name,time)VALUES('$email','".$name2."',NOW())");
							$q2=mysqli_query($connect,"INSERT INTO ngo_image(email,name,time)VALUES('$email','".$name3."',NOW())");

					echo '<script type="text/javascript">
							alert("You have been successfully registered")
							</script>';

					$to_email = $email;
					$subject = "Confirmation Mail";
					$body = "Hi".$fname.$lname.","."You have successfully registered to charity.com"." enjoy your journey with us";
					$headers = "From: charitycampus786@gmail.com";

					if (mail($to_email, $subject, $body, $headers))
					{
						echo '<script type="text/javascript">
						alert("Email successfully sent ...");
						location="NGO_login.html";
						</script>';

					}
					else
					{
						echo '<script type="text/javascript">
						alert("Email sending failed...");
						location="NGO_registration.html";
						</script>';

					}
				}
		}		
	}

}
?>