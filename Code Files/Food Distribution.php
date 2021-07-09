<?php
session_start();
@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
@$t = 'Food Distribution';
@$q = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `type`='$t'");
@$length = 1; 

while (@$row = mysqli_fetch_assoc($q))
{
	if(isset($_POST["".$length.""]))
	{
		@$email = $row['email'];
		@$q1 = mysqli_query($connect,"UPDATE `ngo_details` SET `approve` = '1' WHERE `ngo_details`.`email` = '$email'");
		echo "
		<script>
			location = '123.php';
		</script>";
	}
				@$length = @$length + 1;
}
?>