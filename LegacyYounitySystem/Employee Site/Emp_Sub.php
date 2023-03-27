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
	table, thead, tbody, tr { width: 100%; }
</style>

<body>

<center><DIV class = "border" style="border: 3px solid grey;padding:30px; width:60%; height:150%" >
<h1><center>Employee Submission Form</center></h1>
<!-- Form go to confirmation of request-->
<form action="Emp_SubConfirm.php" method="post">
<table align="left" height= "100px" width = "500px" border=0>

<?php 
session_start();
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Submission date & time: <b>".date("d-M-Y h:i a")."</b><br></p>";
$_SESSION['submission_date'] = date("d-M-Y h:i a"); 
  
?>
</table>

<!-- Table for employee to insert submission details -->
<table align="left" height="200px" width="400px" border=0>
<tr><td>Writer Name:</td><td><input style = "width:200px" type="text" required name="emp_writtername"></td></tr>
<tr><td>Date:</td><td><input style = "width:200px" type="date" required name="emp_subdate"></td></tr>

<tr><td><hr></td><td><hr></td></tr>

<tr><td>Topic/Title:</td><td><input style="width:200px" type="text" required name="emp_subtitle"></td></tr>
<tr><td>Link of Article:</td><td><input style="width:200px" type="url" required name="emp_sublink"></td></tr>
<!-- <tr><td><td><input type="checkbox" name="C_Select" checked value="Find the nearest car/taxi">Find the nearest car or taxi</tr> -->
<tr><td>Description:</td><td><textarea rows="50px" cols="100px" required name="emp_subdescription"></textarea></td></tr>
<tr></tr><tr></tr>
<tr><td></td><td align = "center"><input type="submit" value="Submit"></td></tr>
</table>


</DIV></center>

</body>
</html>