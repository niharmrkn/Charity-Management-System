<?php

@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");

@$submit=$_POST['submit'];
@$name=$_POST['ufname'];
@$type=$_POST['ulname'];
@$email=$_POST['udob'];
@$contact_ngo=$_POST['ucontactno'];
@$person_name=$_POST['uCname'];
@$contact_person=$_POST['uCno'];
@$description=$_POST['Des'];
@$address=$_POST['Address'];
@$bank_account_no=$_POST['ACCNO'];
@$upi_id=$_POST['UPI'];
@$password=$_POST['psw'];
@$psw1=$_POST['psw1'];
@$trending=0;
@$approve=0;
@$fullname="Ishan";


function email_validation($str) { 
    return (!preg_match( 
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
} 

function password_validation($p1){
	
	$uppercase = preg_match('@[A-Z]@', $p1);
	$lowercase = preg_match('@[a-z]@', $p1);
	$number    = preg_match('@[0-9]@', $p1);
	$specialChars = preg_match('@[^\w]@', $p1);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($p1) < 8) {
		TRUE;
	}
}

function password_validation($p1,$p2,$p3){
	
	$uppercase = preg_match('@[A-Z]@', $p1);
	$lowercase = preg_match('@[A-Z]@', $p2);
	$number    = preg_match('@[A-Z]@', $p3);

	if(!$uppercase || !$lowercase || !$number) {
		TRUE;
	}
	
	$uppercase = preg_match('@[a-z]@', $p1);
	$lowercase = preg_match('@[a-z]@', $p2);
	$number    = preg_match('@[a-z]@', $p3);

	if(!$uppercase || !$lowercase || !$number) {
		TRUE;
	}
	
	$uppercase = preg_match('@[^\w]@', $p1);
	$lowercase = preg_match('@[^\w]@', $p2);
	$number    = preg_match('@[^\w]@', $p3);

	if(!$uppercase || !$lowercase || !$number) {
		TRUE;
	}
}

if($submit){
	@$namecheck = mysqli_query($connect,"SELECT email FROM ngo_details WHERE email='$email'");
	@$count = mysqli_num_rows($namecheck);
	if ($count!=0) {
				echo '<script type="text/javascript">
						alert("You are already registered !");
						location="NGO_login.html";
						</script>';
	}
	else{
		if ($name && $type && $email && $contact_ngo && $person_name && $contact_person && $description && $address && $bank_account_no && $upi_id && $password){
			
			if(!email_validation("$email")){ 
				echo "Invalid email address.";die();
			}
			if (password_validation($password)){ 
				echo "Password is not strong";die();
			}
			if($password!=$psw1){
				echo "please enter same password in both the fields";die(); 
			}
			if(number_validation($contact_ngo,$contact_ngo,$bank_account_no)){
				echo "Please eneter valid infromations";die();
			}
			
			$q1="INSERT INTO ngo_details(email,name,type,contact_ngo,person_name,contact_PERSON,description,address,bank_account_no,upi_id,password,trending,approve)VALUES('$email','$name','$type','$contact_ngo','$person_name','$contact_person','$description','$address','$bank_account_no','$upi_id','$password','$trending','$approve')";
			
			@$query2 = mysqli_query($connect,$q1);
			
				echo '<script type="text/javascript">
						alert("You have been succesfully registered");
						location="NGO_login.html";
						</script>';
		}
		else{
			die("Enter all fields");
		}
	}	
}
else{
	echo("Error occured");
}
?>