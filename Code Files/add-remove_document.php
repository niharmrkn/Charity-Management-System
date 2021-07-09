<?php
session_start();
@$connect 	= mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

echo "<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js' charset='utf-8'></script>

    <title>Add/Remove Documnet</title>
	<style>
		body {
		  	background-image: url('Donar_list.jpg');
		  	background-repeat: no-repeat;
		  	background-attachment: fixed;
		  	background-size: 100% 100%;
		}
		.f2:hover{
	        border: 2px solid black; 
	        /*border-top-color: orange;*/
	        background-color: gray;
	        opacity:0.5;
	    }
	    .gallery_a img{
	    	width:200px;
	    	height: 200px;
	    	border-radius: 5px;
	    	cursor: pointer;
	    	transition: 0.3s;
	    	margin: 5px;
	    }
		input[type=submit] {
			background-color: #292b2c;
			color: white;
			padding: 8px 4px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 12%;
		}
		input[type=button] {
			background-color: #292b2c;
			color: white;
			padding: 8px 4px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 12%;
		}
	</style>

</head>
<body>
    <input type='checkbox' id='check'>
    <!--header area start-->
    <header>
      <div class='left_area'>
        <h3>National <span>Relief</span> Fund</h3>
      </div>
      <label for='check'>
        <i class='fas fa-bars' id='sidebar_btn'></i>
      </label>

      <div class='right_area'>
        <a href='logout.php' class='logout_btn'>Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class='mobile_nav'>
      <div class='nav_bar'>
        <img src='1.png' class='mobile_profile_image' alt=''>
        <i class='fa fa-bars nav_btn'></i>
      </div>
<!--      <div class='mobile_nav_items'>
        <a href='#'><i class='fas fa-desktop'></i><span>Dashboard</span></a>
        <a href='#'><i class='fas fa-cogs'></i><span>Components</span></a>
        <a href='#'><i class='fas fa-table'></i><span>Tables</span></a>
        <a href='#'><i class='fas fa-th'></i><span>Forms</span></a>
        <a href='#'><i class='fas fa-info-circle'></i><span>About</span></a>
        <a href='#'><i class='fas fa-sliders-h'></i><span>Settings</span></a>
      </div>-->
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class='sidebar'>
      <div class='profile_info'>";
          @$var =$_SESSION['email'];
          @$name = $_SESSION['name'];

          @$result = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `ngo_image`.`email`='$var'");
          @$numrows = mysqli_num_rows($result);
          if(@$numrows != 0)
          {
            while(@$row = mysqli_fetch_assoc(@$result))
            {
              echo '<img src="uploaded_photos/'.$row['name'].'" class="profile_image" alt=""/>';
            }
          }                            
        echo "<h4>".$name."</h4>";
      echo "</div>
      <a href='NGO_homepage.php'><i class='fas fa-desktop'></i><span>Dashboard</span></a>
      <a href='profile_ngo.php'><i class='fas fa-desktop'></i><span>Profile</span></a>
      <a href='#'><span style='color:red;font-size:20px'>Edits</span></a>
      <a href='add-remove_photo.php'><i class='fas fa-cogs'></i><span>ADD/REMOVE Photo</span></a>
      <a href='add-remove_document.php'><i class='fas fa-cogs'></i><span>ADD/REMOVE Document</span></a>
      <a href='Edit_description.php'><i class='fas fa-cogs'></i><span>Edit Description</span></a>
      <a href='Edit_contact_ngo.php'><i class='fas fa-cogs'></i><span>Edit Contact</span></a>

      <a href='#'><span style='color:red;font-size:20px'>Donors</span></a>
      <a href='NGO_donor.php'><i class='fas fa-th'></i><span>Donor List</span></a>
    </div>
    <!--sidebar end-->
    <div class='content'>
	<script>
           function goto()
            {
                location = 'NGO_homepage.php';
            } 
	</script>
	<br>
	
	<center><h2> Add Documnets </h2></center>
	<hr width='20%'>
	<br>
	<center>
	<form action='add-remove_document.php' method='POST' enctype='multipart/form-data' class='md-form'>
		<h4>	
			Select Documnet :&emsp;
			<input  type='file' name='files'>
			<input type='submit' name='submit' value='upload'>
			<br><br><br>
		</h4>
	</form>";
@$name2=$_FILES["files"]["name"];
//echo $name."<br>";
@$type2 = $_FILES["files"]["type"];
//echo $type."<br>";
@$size2 = $_FILES["files"]["size"];
//echo $size."<br>";
@$temp2 = $_FILES["files"]["tmp_name"];
//echo $temp."<br>";
@$error2 = $_FILES["files"]["error"];
//echo $error."<br>";
@$submit = $_POST['submit'];
if(@$submit)
{
	@$connect 	= mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
	if($error2 > 0)
	{
		echo '<script>alert("oops ! there is a peoblem in uploading document......");</script>';
	}
	else
	{	
		if ($type2 != "application/pdf") {
			echo '<script>alert("Invalid format !..")</script>';
		}
		else{
		move_uploaded_file($temp2,"uploaded_docs/".$name2);
		@$email = $_SESSION['email'];
		$q2=mysqli_query($connect,"INSERT INTO `ngo_docs`(`email`,`name`)VALUES('$email','".$name2."')")or die(" could not upload");
		echo '<script type="text/javascript">
		alert("uploaded succesfully...");
		location="add-remove_document.php";
		</script>';

		}
	}
	//echo $q2; 

}
echo "<br><br>
  	<center>
  		<div class='container'>
		<center><h2> List Of Documnets </h2>
		<hr width='30%'>
		<br><br>
  		<div class='gallery_a'>
  		<table class='table' border='5' width='60%' style='text-align: center'>
			<thead class='thead-dark'>	
				<tr>
					<th>ID</th>
					<th>Document</th>
				</tr>
			</thead>";

  		@$t = $_SESSION['email'];
  		@$qu1 = mysqli_query($connect,"SELECT * FROM `ngo_docs` WHERE `email` = '$t'");
		while (@$row = mysqli_fetch_assoc(@$qu1)) 
		{
			@$id = $row['id'];
			$url = 'http://localhost/phpacademy/SE_project/uploaded_docs/'.$row['name'];
			echo "
				<tr class='table-light'>
				<td>".$id."</td>
				<td><a class onclick href='".$url."'>".$row['name']."</a></td>
				</tr>";
		}  		
  		echo "</table></div></div>
  	</center>
	<br><br><br>
	<center><h2> Delete Documnets</h2>
	<hr width='20%'>
	<form action='add-remove_document_1.php' method='POST'>
		<h3>
			<br><br>		
			Enter Id Of Photo Which You Want To Delete?:&emsp;&emsp;
			<input type='number' name='num'>
			<input type='submit' name='submit1' value='Delete'>
			<br><br>			
		</h3>
	</form></center></div>
</body>
</html>";
?>