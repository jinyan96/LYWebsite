<html>
<head>
	<title>Legacy Younity Sdn Bhd</title>
</head>
<style>
	body {
		background-image: url("background.jpg");
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
	input[type='submit']
	{
    margin:10px 80px 10px 80px; //just an example, you can add according to your need
	}
</style>

<body>

<center><DIV class = "border" style="border: 3px solid grey;padding:30px; width:55%; height: 40%" >
<h1><center>Upload Image</center></h1>
<!--Form go the customer request form -->
<form action="Emp_Dashboard.php" method="post" enctype="multipart/form-data">

<table align="center" height="100px" width="500px" border=0>
<?php
session_start();
//Display Date
$_SESSION['date'] = date("d-M-Y h:i a");
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Upload Image Date: <b>".date("d-M-Y h:i a")."</p></b>";

   //Connect to DB
   $con = mysqli_connect('localhost','admin','');
   mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   
?>
<tr><td>Upload your profile picture:</td><td><input type = "file" name = "epl_picture"></td></tr>
</table>
<td></td><td align="center"><input type="submit" name="Upload" value="Upload"></td>
<td></td><td align="center"><input type="submit" name="Back to Dashboard" value="Back to Dashboard"></td>


</form>

</DIV></center>

</body>
</html>
