<?php
session_start();
@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
@$q = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `approve`='1'");
while(@$row = mysqli_fetch_assoc($q))
{
	@$email =  $row['email'];
		@$q1 = mysqli_query($connect,"UPDATE `ngo_details` SET `approve` = '0' WHERE `ngo_details`.`email` = '$email'");
		echo "
		<script>
			location = 'Donor_dashboard.php';
		</script>";
}

?>