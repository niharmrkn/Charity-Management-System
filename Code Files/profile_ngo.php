<?php
session_start();
@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

 echo "<!DOCTYPE html>
<html>
<head>
    <title>hello</title>
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel='stylesheet' href='https://bootswatch.com/4/simplex/bootstrap.min.css' />

</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-12'>
            <div class='card'>

                <div class='card-body'>
                    <div class='card-title mb-4'>
                        <div class='d-flex justify-content-start'>
                            <div class='image-container'>";
                            @$var =$_SESSION['email'];
							@$result = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `ngo_image`.`email`='$var'");
							@$numrows = mysqli_num_rows($result);
							if(@$numrows != 0)
							{
								while(@$row = mysqli_fetch_assoc(@$result))
								{
									echo '<img src="uploaded_photos/'.$row['name'].'" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail"/>';
								}
							}                             
                                echo "
                                <!--<div class='middle'>
                                    <input type='button' class='btn btn-secondary' id='btnChangePicture'
                                        value='Change' />
                                    <input type='file' style='display: none;' id='profilePicture' name='file' />
                                </div>-->
                            </div>
                            <div class='userData ml-3'>
                                <h2 class='d-block' style='font-size: 1.5rem; font-weight: bold'><a
                                        href='javascript:void(0);'><br><br>"; echo ' '.$_SESSION['name'].' '; 
                                        echo "</a></h2>
                                <!--<h6 class='d-block'><a href='javascript:void(0)'>1,500</a> Total Donation</h6>
                                <h6 class='d-block'><a href='javascript:void(0)'>30</a> Stars*</h6>-->
                            </div>
                            <div class='ml-auto'>
                                <input type='button' class='btn btn-primary d-none' id='btnDiscard'
                                    value='Discard Changes' />
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12'>
                            <ul class='nav nav-tabs mb-4' id='myTab' role='tablist'>
                                <li class='nav-item'>
                                    <a class='nav-link active' id='basicInfo-tab' data-toggle='tab' href='#basicInfo'
                                        role='tab' aria-controls='basicInfo' aria-selected='true'>Basic Info</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link' id='connectedServices-tab' data-toggle='tab'
                                        href='NGO_homepage.php' role='tab' aria-controls='connectedServices'
                                        aria-selected='false'>Return</a>
                                </li>
                            </ul>
                            <div class='tab-content ml-1' id='myTabContent'>
                                <div class='tab-pane fade show active' id='basicInfo' role='tabpanel'
                                    aria-labelledby='basicInfo-tab'>


                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Name OF Organizatiion</label>
                                        </div>
                                        <div class='col-md-8 col-6'>";
                                            echo ' '.$_SESSION['name'].' ';
                                        echo "</div>
                                    </div>
                                    <hr />

                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Type OF Organizatiion</label>
                                        </div>
                                        <div class='col-md-8 col-6'>";
                                            echo ' '.$_SESSION['type'].' ';
                                        echo "</div>
                                    </div>
                                    <hr />

                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Address</label>
                                        </div>
                                        <div class='col-md-8 col-6'>";
                                            echo ' '.$_SESSION['address'].' ';
                                        echo "</div>
                                    </div>
                                    <hr />


                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Contact No.</label>
                                        </div>
                                        <div class='col-md-8 col-6'>";
                                            echo $_SESSION['contact'].' ';
                                        echo "</div>
                                    </div>
                                    <hr />
                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Email</label>
                                        </div>
                                        <div class='col-md-8 col-6'>";
                                            echo ' '.$_SESSION['email'];
                                        echo "</div>
                                    </div>
                                    <hr />
                                </div>
                                <div class='tab-pane fade' id='connectedServices' role='tabpanel'
                                    aria-labelledby='ConnectedServices-tab'>
                                    Facebook, Google, Twitter Account that are connected to this account
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
<!------ Include the above in your HEAD tag ---------->




";

?>