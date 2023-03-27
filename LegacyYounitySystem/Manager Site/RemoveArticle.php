<?php
session_start();
$con=mysqli_connect('localhost', 'admin', '');
mysqli_select_db($con,'legacyyounity');

	$sql = "DELETE from article_information where articleid = '".$_SESSION['rarticle_id']."'";
	$result = mysqli_query($con, $sql);
	
	mysqli_close($con);
	header("location: Mng_Dashboard.php");

?>