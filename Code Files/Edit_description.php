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

    <title>Edit Description</title>
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
		.a {
			background-color:white;

			color: black;
			padding: 8px 4px;
			margin: 8px 0;
			border: solid black;
			width: 70%;
		}
		.b {
			border: solid black;
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
	
	
	<center><h2> Edit Description </h2></center>
	<hr width='20%'>
	<br>
	<h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Current Content</h3>
	<center>";
echo		"
	
			<table class='b' width='70%'>
			<tr>
				<td>
					<ul><li>";
					$t1 = $_SESSION['email'];
					@$query2 = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `email`='$t1'");
					while (@$row = mysqli_fetch_assoc(@$query2)) 
					{
						@$dbtname = $row['description'];
					}
					for ($i=0; $i < strlen($dbtname); $i++)
					{
						echo "".$dbtname[$i].""; 
						if ($dbtname[$i]=='.' && $i != (strlen($dbtname)-1) )
						{
							echo "</li><li>";
						}
						else if($i == (strlen($dbtname)-1))
						{
							echo "</li>";
						}
					}
					echo "</ul>
				</td>
			</tr>

		</table></center>";

	echo "	<br><br><br><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Content</h3>
<center><form action='Edit_description.php' method='POST' enctype='multipart/form-data' class='md-form'>
		<h4>	
			<textarea  class='a' name='edit' placeholder='Write something....'></textarea>
			<br><h5 style='color:red'>(Please Use <b>'.'</b> for new line...)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h5>
			<br>
			<input type='submit' name='submit' value='Change'>
			<br><br><br>
		</h4>
	</form>";
@$submit1 = $_POST['submit'];
@$desc = $_POST['edit'];
if(@$submit1 && @$desc)
{	
	@$t = $_SESSION['email'];
	@$q1 = mysqli_query($connect , "UPDATE `ngo_details` SET `description`= '$desc' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_description.php";
		</script>';

}
echo "</div>
</body>
</html>";

?>
