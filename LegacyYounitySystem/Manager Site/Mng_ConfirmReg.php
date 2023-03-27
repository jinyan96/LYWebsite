<html>
<head>
	<title>Legacy Younity Sdn Bhd</title>
</head>
<style>
	body {
		background-image: url("managerbackground.jpg");
		background-size: 100% 100%;
	}
	.border {
		/*background-image: url("sportcar.jpg");*/
		background-size: 100% 100%;
		background-color: white;
	}
	table{
		font-size: 20px;
	}
	h1{
		font-size: 30px;
	}
	p{
		font-size: 20px;
	}
</style>

<body>

<center><DIV class = "border" style="border: 3px solid grey;padding:30px; width:50%; height: 70%" >
<h1><center>Manager Confirmation Registration</center></h1>
<!-- Form back to login screen -->
<form action="Mng_Login.php" method="post">
<table align="center" height="100px" width="500px" border=0>

<?php
session_start();
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");

echo "<p align = left>Registered Date & Time: <b>".$_SESSION['date']."</b><br></p>";
	//Connect to db
	$con=mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
	//Test
	/*
	if(!$con)
	{
		echo'Not connected to server';
	}
	if (!mysqli_select_db($con,'didi'))
	{
		echo'Database Not selected';
	}
	*/
	
	//Insert data to db
	$sqlemp ="INSERT INTO manager_information(username,ic,password,email,contact,gender,dob,status,regdate)
	 VALUES ('".$_POST['man_username']."','".$_POST['man_ic']."','".$_POST['man_password']."','".$_POST['man_email']."','".$_POST['man_contact']."','".$_POST['man_gender']."','".$_POST['man_dob']."',
			'".$_POST['man_status']."','".$_SESSION['date']."')";
			
	mysqli_query($con,$sqlemp);
	
	//Test
	/*
	if (!mysqli_query($con,$sqlcus))
	{
		echo'Not Inserted';
	}
	else
	{
		echo'Inserted';
	}
	*/
	
?>

<?php
	//Display data inserted
    echo "<p align = left>Username &nbsp&nbsp&nbsp: <b>".$_POST['man_username']."</b><br></p>".
		 "<p align = left>Ic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_ic']."</b><br></p>".
		 "<p align = left>Password &nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_password']."</b><br></p>".
         "<p align = left>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_email']."</b><br></p>".
         "<p align = left>Contact &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_contact']."</b><br></p>".
		 "<p align = left>Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_gender']."</b><br></p>".
		 "<p align = left>Date of Birth : <b>".$_POST['man_dob']."</b><br></p>".
		 "<p align = left>Status &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$_POST['man_status']."</b><br></p>";
		 
?>

<tr><td></td><td align="center"><input type="submit" value="Confirm"></td>
</form>

</DIV></center>
</body>
</html>