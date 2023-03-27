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

<center><DIV class = "border" style="border: 1px solid grey;padding:30px; width:45%; height: 70%" >
<h1><img src="LegacyLogo.png" alt="Company Logo" width="300px" height="250px" style="vertical-align;margin:0px 50px"><center>Manager Login</center></h1>

<table align="center" height="100px" width="500px" border=0>

<?php
session_start();
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");
echo "<p align = left>Date and Time of Login: <b>".date("d-M-Y h:i a")."</p></b><br>";
?>

<!-- Form go to checking page -->
<form action ="Mng_Check.php" method="post">
<tr><td>Manager Email:</td><td><input style="width:200px" type="text" required name="man_email"></td></tr>
<tr><td>Password :</td><td><input style="width:200px" type="password" required name="man_password" id="man_password"></td></tr>
<tr><td></td><td><span toggle="#man_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>Show Password</td></tr>
<tr><td></td><td><input type="submit" value="Login" name="Login"></td></tr>
</form>

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

<!-- Form go to Registration screen -->
<form action="Mng_Reg.php" method="post">
<tr><td></td><td><input type="submit" value="Register Here"></td></tr>
</form>

</table>

</DIV></center>

</body>
</html>