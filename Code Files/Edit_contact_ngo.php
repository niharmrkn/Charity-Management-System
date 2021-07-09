<?php
session_start();
@$connect 	= mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

echo "
<!DOCTYPE html>
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
		
	<title>Edit contact</title>
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
			padding: 8px 12px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 50%;
		}
		input[type=button] {
			background-color: #292b2c;
			color: white;
			padding: 8px 12px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 15%;
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
	<center><h2> Edit Contact Info. </h2></center>
	<hr width='20%'>
	<br><br>
	<center>
";
@$t1 = $_SESSION['email'];
@$query2 = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `email`='$t1'");
while (@$row = mysqli_fetch_assoc(@$query2))
{
	@$dbtname = $row['person_name'];
	@$dbtemail = $row['temail'];
	@$dbid1 = @$row['id1'];
	@$dbid2 = @$row['id2'];
	@$dbc1 = @$row['c1'];
	@$dbc2 = @$row['c2'];
	@$dbadd = $row['address'];
}
echo "<table class='table' border='5' width='60%' style='text-align: center'>";
echo "	
			<thead class='thead-dark'>	
			<tr>
			<th width='15%'>
			Content
			</th>
			<th width='15%'>
			Current Data
			</th>			
			<th width='15%'>
			New Data
			</th>
			<th width='15%'>
			Edit Data
			</th>
			</tr>
			</thead>
			<tr class='table-light'>
				<td width='15%'>
				Trustee Name
				</td>
				<td width='30%'>".$dbtname."
				</td>
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>a. <input type='text' name='tname'>
				</td>
				<td>
				<input type='submit' name='Ssubmit' value='Change'>
				</form>
				</td>
			<tr>";
@$submit1 = $_POST['Ssubmit'];
@$tname = $_POST['tname'];
if(@$submit1 && @$tname)
{	
	@$t = $_SESSION['email'];
	@$q1 = mysqli_query($connect , "UPDATE `ngo_details` SET `person_name`= '$tname' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
			echo "<tr class='table-light'>
				<td width='15%'>
				Trustee Email
				</td>
				</td>
				<td width='30%'>".$dbtemail."
				</td>
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>a. <input type='email' name='temail'>
				</td>
				<td width='15%'>
				<input type='submit' name='tsubmit2' value='Change'>
				<input type='submit' name='tsubmit3' value='Delete'>
				</form>
				</td>
			<tr>";
@$submit2 = $_POST['tsubmit2'];
@$e1 = $_POST['temail'];
if(@$submit2 && @$e1)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `temail`= '$e1' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
@$submit3 = $_POST['tsubmit3'];
if(@$submit3)
{
	@$t = $_SESSION['email'];
	@$e2 = "example@gmail.com";
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `temail`= '$e2' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}

			echo "<tr class='table-light'>
				<td width='15%' rowspan='2'>
				NGO Email id's:
				</td>
				</td>
				<td width='30%'>".$dbid1."
				</td>				
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>a. <input type='email' name='nemail1'>
				</td>
				<td width='30%'>
				<input type='submit' name='id11' value='Add'>
				<input type='submit' name='id12' value='Change'>
				<input type='submit' name='id13' value='Delete'>
				</form>
				</td>
			</tr>";
@$e3 = $_POST['nemail1'];
@$id11 = $_POST['id11'];
@$id12 = $_POST['id12'];
@$id13 = $_POST['id13']; 

if(@$id11 && @$e3)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id1`= '$e3' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$id12 && @$e3)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id1`= '$e3' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$id13 && @$e3)
{
	@$f = "NA";
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id1`= '$f' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}

			echo "<tr class='table-light'>
				</td>
				<td width='30%'>".$dbid2."
				</td>				
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>b. <input type='email' name='nemail2'>
				</td>
				<td width='30%'>
				<input type='submit' name='id21' value='Add'>
				<input type='submit' name='id22' value='Change'>
				<input type='submit' name='id23' value='Delete'>
				</form>
				</td>
			</tr>";
@$e4 = $_POST['nemail2'];
@$id21 = $_POST['id21'];
@$id22 = $_POST['id22'];
@$id23 = $_POST['id23']; 

if(@$id21 && @$e4)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id2`= '$e4' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$id22 && @$e4)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id2`= '$e4' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$id23 && @$e4)
{
	@$f = "NA";
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `id2`= '$f' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}

			echo "<tr class='table-light'>
				<td width='15%' rowspan='2'>
				NGO Contact's:
				</td>
				</td>
				<td width='30%'>".$dbc1."
				</td>
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>a. <input type='number' name='nnum1'>
				</td>
				<td width='30%'>
				<input type='submit' name='num11' value='Add'>
				<input type='submit' name='num12' value='Change'>
				<input type='submit' name='num13' value='Delete'>
				</form>
				</td>
			</tr>";
@$e5 = $_POST['nnum1'];
@$num11 = $_POST['num11'];
@$num12 = $_POST['num12'];
@$num13 = $_POST['num13']; 

if(@$num11 && @$e5)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c1`= '$e5' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$num12 && @$e5)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c1`= '$e5' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$num13 && @$e5)
{
	@$f = "0000000000";
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c1`= '$f' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}

			echo "<tr class='table-light'>
				</td>
				<td width='30%'>".$dbc2."
				</td>
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>b. <input type='number' name='nnum2'>
				</td>
				<td width='30%'>
				<input type='submit' name='num21' value='Add'>
				<input type='submit' name='num22' value='Change'>
				<input type='submit' name='num23' value='Delete'>
				</form>
				</td>
			</tr>";
@$e6 = $_POST['nnum2'];
@$num21 = $_POST['num21'];
@$num22 = $_POST['num22'];
@$num23 = $_POST['num23']; 

if(@$num21 && @$e6)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c2`= '$e6' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$num22 && @$e6)
{
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c2`= '$e6' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
if(@$num23 && @$e6)
{
	@$f = "0000000000";
	@$t = $_SESSION['email'];
	@$q2 = mysqli_query($connect , "UPDATE `ngo_details` SET `c2`= '$f' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}

			echo "<tr class='table-light'>
				<td width='15%'>
				NGO Address
				</td>
				</td>
				<td width='30%'>".$dbadd."
				</td>
				<td width='30%'>
				<form action='Edit_contact_ngo.php' method='POST'>
				<p>a. <textarea name='nadd'></textarea>
				</td>
				<td width='30%'>
				<input type='submit' name='adds' value='Change'>
				</form>
				</td>
			</tr>";
@$adds = $_POST['adds'];
@$nadd = $_POST['nadd'];
if(@$adds && @$nadd)
{	
	@$t = $_SESSION['email'];
	@$q1 = mysqli_query($connect , "UPDATE `ngo_details` SET `address`= '$nadd' WHERE `email` ='$t'");
			echo '<script type="text/javascript">
		location="Edit_contact_ngo.php";
		</script>';

}
echo "</table>";
echo "
</center>
</div>
</body>
</html>
";
?>