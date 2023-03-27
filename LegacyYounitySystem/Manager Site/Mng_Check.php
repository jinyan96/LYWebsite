<?php
session_start();

$_SESSION['mng_email']=$_POST['man_email'];
$_SESSION['mng_password']=$_POST['man_password'];

// Connect to MYSQL database and run select query to check useraneme and password.
$con=mysqli_connect('localhost', 'admin', '');
mysqli_select_db($con,'legacyyounity');
$qry="select * from manager_information where email='".$_SESSION['mng_email']."' and password='".$_SESSION['mng_password']."' ";
$result=mysqli_query($con, $qry);
if(mysqli_num_rows($result)!=0) {

	mysqli_close($con);
	header("location: Mng_Dashboard.php");

	$update = "Update manager_information set status = 'Active' ";
	$updateresult = mysqli_query($con, $update);

}
else { 
	//echo "Invalid password / username";
	mysqli_close($con); 
	unset($_SESSION); session_destroy(); 
	header("location: Mng_Login.php");	
}

?>