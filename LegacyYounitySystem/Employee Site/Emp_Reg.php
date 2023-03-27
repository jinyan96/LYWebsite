<html
<head><title>Legacy Younity Sdn Bhd</title></head>
<style>
	body{
		background-image: url("background.jpg");
		background-size: 100% 100%;
	}
	.border{
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
<center>
<br><br><br>
<DIV class="border" style="border: 1px solid grey; padding: 30px; width: 55%; height:70%">
<!-- Form go to customer confirmation on registration -->
<form action="Emp_ConfirmReg.php" method="post" enctype="multipart/form-data">

<?php 
session_start();
echo "<h1><center>Employee Registration Form</center></h1>";
//Display Date
$_SESSION['date'] = date("d-M-Y h:i a");
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Registration Date & Time: <b>".date("d-M-Y h:i a")."</b><br></p>";
?>
<!-- Customer Registration Form -->
<table align="left" height="200px" width="400px" border=0>
<tr><td>Employee Name:</td><td><input style="width:200px" type="text" required name="emp_username"></td></tr>
<tr><td>Ic:</td><td><input style="width:200px" type="text" required name="emp_ic" maxlength = 12></td></tr>
<tr><td>Contact Number:</td><td><input style="width:200px" type="text" required name="emp_contact"></td></tr>
<tr><td>Email:</td><td><input style="width:200px" type="text" required name="emp_email"></td></tr>
<tr><td>Password:</td><td><input style="width:200px" type="password" required name="emp_password" id = "emp_password"></td></tr>
<tr><td></td><td><span toggle="#emp_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>Show Password</td></tr>

<!-- Show Password -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<!-- Function show password -->
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

<tr><td>Gender:</td><td>               
<select name = "emp_gender">
	<option value = " " selected></option>
	<option value = "Male">Male</option>
	<option value = "Female">Female</option>
</select></td></tr>
<tr><td>Date of Birth:</td><td><input style="width:200px" type="date" required name="emp_dob"></td></tr>
<tr><td>Status:</td><td>Active</td><input type="hidden" name="emp_status" value = "Active"></td></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr><td align = "right"><input type="submit" value="Submit" name="Submit"> </td>
</form>

<!-- Form back to Login screen-->
<form action="Emp_Login.php" method = "post">
<td align = "center"><input type="submit" value="Back To Login"></td></tr>
</form>

</table>

</DIV></center>

</body>
</html>>