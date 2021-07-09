<?php
session_start();

echo "<!doctype html>
		<html lang='en'>

		<head>
		    <!-- Required meta tags -->
		    <meta charset='utf-8'>
		    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

		    <!-- Bootstrap CSS -->
		    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'
		        integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>

		    <title>Donate now</title>
				<style>
				.dropbtn {
				  background-color: #4CAF50;
				  color: white;
				  padding: 16px;
				  font-size: 16px;
				  border: none;
				}

				.dropdown {
				  position: relative;
				  display: inline-block;
				  float: right;
				}

				.dropdown-content {
				  display: none;
				  position: absolute;
				  background-color: #f1f1f1;
				  min-width: 160px;
				  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				  z-index: 1;
				}

				.dropdown-content a {
				  color: black;
				  padding: 12px 16px;
				  text-decoration: none;
				  display: block;
				}

				.dropdown-content a:hover {background-color: #ddd;}

				.dropdown:hover .dropdown-content {display: block;}

				.dropdown:hover .dropbtn {background-color: #3e8e41;}
				</style>		    
		</head>

		<body>
		    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
		        <a class='navbar-brand' href='#'><span class='badge badge-primary'>Charity.com</span></a>
		        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
		            aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
		            <span class='navbar-toggler-icon'></span>
		        </button>

		        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
		            <ul class='navbar-nav mr-auto'>
		                <li class='nav-item active'>
		                    <a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
		                </li>
		                <!--<li class='nav-item'>
		                    <a class='nav-link' href='Admin_login.html'>Admin</a>
		                </li>
		                <li class='nav-item dropdown'>
		                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
		                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		                        Donor
		                    </a>
		                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
		                        <a class='dropdown-item' href='Donor_login.html'>Login</a>
		                        <a class='dropdown-item' href='donor_reg.php'>Register</a>
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
		                </li>-->
		                <li class='nav-item'>
		                    <a class='nav-link' href='#'>Contact Us</a>
		                </li>
		            </ul>
		            <form class='form-inline my-2 my-lg-0'>
		                <!--<input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
		                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>-->";
		                
		                echo "<div class='dropdown'>";
							echo "Welcome ".@$_SESSION['name']."&emsp;<img src='download.png' height='30' width='30'></h2>";  
							echo  "<div class='dropdown-content'>
							    <a href='NGO_dashboard.php'><img src='dashboard.png' height='20' width='20'>&emsp;Dashboard</a>
							    <a href='profile_ngo.php'><img src='download.png' height='30' width='30'>&emsp;Profile</a>
							    <a href='logout.php'><img src='logout.png' height='30' width='30'>&emsp;Logout</a>
							  </div>
							</div>";
		                
		          echo  "</form>
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
		            <li class='breadcrumb-item'><a href='#'>Home</a></li>
		            <li class='breadcrumb-item'><a href='#'>NGOs</a></li>
		        </ol>
		    </nav>
		    <!--
		    <div class='card' style='width: 18rem;'>
		        <img src='https://images.unsplash.com/photo-1585436780067-6409c189bf7f?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=900&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=1600'
		            class='card-img-top' alt='...'>
		        <div class='card-body'>
		            <h5 class='card-title'>Covid-19</h5>
		            <p class='card-text'>Some NGOs which works for Covid-19.</p>
		            <a href='#' class='btn btn-primary'>Donate</a>
		        </div>
		    </div>
		    
		    <div class='card mb-3'>
		        <img src='https://images.unsplash.com/photo-1585436780067-6409c189bf7f?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=900&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=1600' class='card-img-top' alt='...'>
		        <div class='card-body'>
		            <h5 class='card-title'>Covid-19</h5>
		            <p class='card-text'>Some NGOs which works for Covid-19.</p>
		            <a href='#' class='btn btn-primary'>Donate</a>
		            <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
		        </div>
		    </div>
		    -->
		    <div class='card-group'>
		        <div class='card'>
		            <img src='https://images.unsplash.com/photo-1585436780067-6409c189bf7f?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=900&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=1600'
		                class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Covid-19</h5>
		                <p class='card-text'>Some NGOs which works for Covid-19.</p>
		                <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		        <div class='card'>
		            <img src='data:image/jpeg;base64,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'
		                class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Education</h5>
		                <p class='card-text'>NGOs which works for Primary education for childer.</p>
		                <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		        <div class='card'>
		            <img src='data:image/jpeg;base64,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'
		                class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Food Distribution</h5>
		                <p class='card-text'>Some NGOs which provides Food to poor childrens.</p>
		                <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		    </div>

		    <div class='card-group'>
		        <div class='card'>
		            <img src='data:image/jpeg;base64,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'
		                class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Shelter Home</h5>
		                <p class='card-text'>Shelter homes for Childerens.</p>
		                <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		        <div class='card'>
		            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSoL6hXJzR3Acrf47Mac4Ziz_RilRKWoOqefA&usqp=CAU' class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Old Age Home</h5>
		                <p class='card-text'>Old Age Homes which provides all facilities.</p>
		                <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		        <div class='card'>
		            <img src='https://th.thgim.com/migration_catalog/article11099623.ece/alternates/FREE_435/Mamp12suham5.JPG' class='card-img-top' alt='...'>
		            <div class='card-body'>
		                <h5 class='card-title'>Health Care</h5>
		                <p class='card-text'>Some Hospitals which provides free health checkup and medicine.</p>
		                    <a href='#' class='btn btn-primary'>Donate</a>
		            </div>
		            <div class='card-footer'>
		                <small class='text-muted'>Last updated 3 mins ago</small>
		            </div>
		        </div>
		    </div>













		    <!-- Optional JavaScript -->
		    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'
		        integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj'
		        crossorigin='anonymous'></script>
		    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'
		        integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN'
		        crossorigin='anonymous'></script>
		    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'
		        integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV'
		        crossorigin='anonymous'></script>
		</body>

		</html>";
?>