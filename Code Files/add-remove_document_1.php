<?php
session_start();
@$connect 	= mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

	@$sub = $_POST['submit1'];
	@$id1 = $_POST['num'];
	if($sub && $id1)
	{
  		@$t = $_SESSION['email'];
  		@$qu1 = mysqli_query($connect,"SELECT * FROM `ngo_docs` WHERE `email` = '$t'");
  		@$flag = 0;
		while (@$row = mysqli_fetch_assoc(@$qu1)) 
		{
			@$id = $row['id'];
			if($id == $id1)
			{
				@$flag = 1;
				break;
 			}
		}  		
		if(@$flag == 1)
		{
			@$q2 = mysqli_query($connect,"DELETE FROM `ngo_docs` WHERE `ngo_docs`.`id` = '$id1'");
			echo '<script type="text/javascript">
			alert("deleted succesfully...");
			location="add-remove_document.php";
			</script>';	
		}
		else
		{
			echo '<script type="text/javascript">
			alert("Enter a valid id..");
			location="add-remove_document.php";
			</script>';	

		}
	}
?>