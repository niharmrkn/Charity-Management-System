<?php
session_start();
echo "
<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'
        integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>

    <title>Covid-19 NGOs</title>
</head>
<body>

    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='HOME.html'><span class='badge badge-primary'>Charity.com</span></a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
            aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
                <li class='nav-item active'>
                    <a class='nav-link' href='HOME.html'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='Admin_login.html'>Admin</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Donor
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='Donor_login.html'>Login</a>
                        <a class='dropdown-item' href='Donor_registration.html'>Register</a>
                    </div>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        NGO
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='NGO_login.html'>Login</a>
                        <a class='dropdown-item' href='NGO_registration.html'>Register</a>
                    </div>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Contact Us</a>
                </li>
            </ul>
            <form class='form-inline my-2 my-lg-0'>
                <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
            </form>
        </div>
    </nav>

    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Want to Donate!</strong> Click on Donor and Register.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>

    <nav aria-label='breadcrumb'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href='HOME.html'>Home</a></li>
            <li class='breadcrumb-item'><a href='Donor_dashboard.php'>NGOs</a></li>

";
@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

@$submit1 = $_POST['submit1'];
@$submit2 = $_POST['submit2'];
@$submit3 = $_POST['submit3'];
@$submit4 = $_POST['submit4'];
@$submit5 = $_POST['submit5'];
@$submit6 = $_POST['submit6'];
if($submit1)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>COVID-19</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
    
";

	@$value = 'Covid-19';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	$length =0;
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Covid-19.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>
    
    ";
	}

}


if($submit2)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>Education</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
";
	$length = 0;
	@$value = 'Education';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Education.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>";
	}
}
if($submit3)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>Food Distribution</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
";
	@$length = 0;
	@$value = 'Food Distribution';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Food_distribution.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>";
	}
}
if($submit4)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>Shelter Home</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
";
	$length = 0;
	@$value = 'Shelter Home';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Shelter_home.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>";
	}
}
if($submit5)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>Old Age Home</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
";
	$length = 0;
	@$value = 'Old Age Home';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Old_age_home.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>";
	}
}
if($submit6)
{
	echo "
	        <li class='breadcrumb-item'><a href='#'>Health Care</a></li>
        </ol>
    </nav>
    <br>
    <br>
    <center>
        <h3 style='font-family: 'Times New Roman', Times, serif; color: tomato;'> We Rise by Lifting Others. </h3>
    </center>
    <br>
    <br>
";
	$length = 0;
	@$value = 'Health Care';
	@$q = mysqli_query($connect , "SELECT * FROM `ngo_details` WHERE `type` = '$value'");
	while(@$row = mysqli_fetch_assoc(@$q))
	{
		$length = $length + 1;
		@$dbemail = $row['email'];
		@$dbname = $row['name'];
		@$dbdesc = $row['description'];
		@$q1 = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `email`='$dbemail'");
		while (@$row1 = mysqli_fetch_assoc(@$q1))
		{
			@$url = 'uploaded_photos/'.$row1['name'];
		}
		echo "
		<div class='card mb-3' style='max-width: 2000px;'>
	        <div class='row no-gutters'>
	            <div class='col-md-4'>";
	    echo "
	              <img src='".$url."' class='card-img' alt='...' height='100%'>
            	</div>
            <div class='col-md-8'>
            <div class='card-body'>
                    <h5 class='card-title'>".$dbname."</h5>
                    <p class='card-text'>".$dbdesc."</p>
                    <br><br><br>
                    <form action='Health_care.php' method='POST'>
                    <input type='submit' class='btn btn-primary' name='".$length."' value='Donate'>
                    </form>
            </div>
          	</div>
        </div>
    </div>";
	}
}


?>