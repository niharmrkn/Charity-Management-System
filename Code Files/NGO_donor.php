<?php
session_start();
@$connect 	= mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

echo "
<!DOCTYPE html>
<html>
<head>
	
	<!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>NGO Homepage</title>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js' charset='utf-8'></script>
		
	<title>Donor_list</title>
	<style>
		body {
		  	background-image: url('NGO_homepage.jpg');
		  	background-repeat: no-repeat;
		  	background-attachment: fixed;
		  	background-size:100% 100%;
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
    <div class='content_a'>
	<br>
	<center><h2> Donars List </h2></center>
	<hr width='20%'>
	<br><br>
	<center>
";
@$query1     = mysqli_query($connect,"SELECT * FROM donor_reg");

echo "<table class='table' border='5' width='70%' style='text-align: center'>";
echo "		<thead class='thead-dark'>	
				<tr>
					<th>firstname</th>
					<th>lastname</th>
					<th>email-id</th>
					<th>Donated Amount</th>
				</tr>
			</thead>";
			
	while (@$row = mysqli_fetch_assoc(@$query1)) 
	{

		@$dbfname = $row['Fname'];
		@$dblname = $row['Lname'];
		@$dbemail = $row['email'];
		@$dbdonation = $row['donated'];
		if(@$dbdonation != 0)
		{
		echo "
			<tr class='table-light'>
				<td width='10%'>
					$dbfname
				</td>
				<td width='10%'>
					$dblname
				</td>
				<td width='20%'>
					$dbemail
				</td>
				<td width='10%'>
					$dbdonation
				</td>
			</tr>

			";	
		}
	}
	echo "</table>";

echo "
	<br>
	<script>
           function goto()
            {
                location = 'NGO_homepage.php';
            } 
	</script>
	<form action='NGO_donor.php' method='POST'>
		<h3>
			<br><br>		
			Enter email whom you want to request ? :&emsp;&emsp;
			<input class='f2' type='email' name='email'>
			<br><br>
			Enter Amount :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<input class='f2' type='number' name='num'>
			<br><br>
			<input type='submit' name='submit' value='Request'>
			<br><br>
		</h3>
	</form>

";
@$submit = $_POST['submit'];
@$email = $_POST['email'];
@$amount = $_POST['num'];

if(@$submit)
{
	@$qu1 = mysqli_query($connect,"SELECT * FROM `donor_reg` WHERE `email`='$email'");
	while (@$row = mysqli_fetch_assoc(@$qu1)) 
	{
		@$dbemail = $row['email'];
		@$dbfname1 = $row['Fname'];
		@$dblname1 = $row['Lname'];

	}

	$to_email = $dbemail;
	$subject = "Request For Donation";
	$body = "Hi".$dbfname1.$dblname1.","."A NGO named ".$_SESSION['name']."  request for the donation of amount ".$amount." if you want to donate then visit our site and donate that ngo...(Requester email address : ".$_SESSION['email'].")";
	$headers = "From: ishanmodi13@gmail.com";
	
	
	if (mail($to_email, $subject, $body, $headers))
	{
		echo '<script type="text/javascript">
		alert("Email successfully sent ...");
		location="NGO_donor.php";
		</script>';

	}
	else
	{
		echo '<script type="text/javascript">
		alert("Email sending failed...");
		location="NGO_donor.php";
		</script>';
	}

}
echo "
</center>
</div>
</body>
</html>
";
?>