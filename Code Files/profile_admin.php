<?php
session_start();
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
                            <div class='image-container'>
                                <img src='download.png' id='imgProfile'
                                    style='width: 150px; height: 150px' class='img-thumbnail' />
                                
                            </div>
                            <div class='userData ml-3'>
                            <br><br><br>
                                <h2 class='d-block' style='font-size: 1.5rem; font-weight: bold'><a
                                        href='javascript:void(0);'>Administrator</a></h2>
                               <!-- <h6 class='d-block'><a href='javascript:void(0)'>1,500</a> Total Donation</h6>
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
                                        href='Admin_dashboard.php' readline_on_new_line()='tab' aria-controls='connectedServices'
                                        aria-selected='false'>Return</a>
                                </li>

                            </ul>
                            <div class='tab-content ml-1' id='myTabContent'>
                                <div class='tab-pane fade show active' id='basicInfo' role='tabpanel'
                                    aria-labelledby='basicInfo-tab'>


                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Full Name</label>
                                        </div>
                                        <div class='col-md-8 col-6'>
                                            Administrator
                                        </div>
                                    </div>
                                    <hr />
                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Contact No.</label>
                                        </div>
                                        <div class='col-md-8 col-6'>
                                            9846273913
                                        </div>
                                    </div>
                                    <hr />
                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Email</label>
                                        </div>
                                        <div class='col-md-8 col-6'>
                                            charitycampus786@gmail.com
                                        </div>
                                    </div>
                                    <hr />
                                    <div class='row'>
                                        <div class='col-sm-3 col-md-2 col-5'>
                                            <label style='font-weight:bold;'>Password</label>
                                        </div>
                                        <div class='col-md-8 col-6'>
                                            ************
                                        </div>
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