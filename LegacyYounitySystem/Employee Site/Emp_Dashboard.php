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
	#img_div{
   	width: 20%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
</style>

<body>

<center><DIV class = "border" style="border: 3px solid grey;padding:30px; width:50%; height: 90%" >
<h1><center>Employee Dashboard</center></h1>
<!--Form go the customer request form -->
<form action="Emp_Sub.php" method="post">
<table align="center" height="100px" width="500px" border=0>

<?php
session_start();
//Display Date
$_SESSION['date'] = date("d-M-Y h:i a");
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Date and Time of Login: <b>".date("d-M-Y h:i a")."</p></b>";

   //Connect to DB
   $con = mysqli_connect('localhost','admin','','legacyyounity');
   //mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   if(isset($_POST['Upload']))
   {
	//Insert data to db
	$image = $_FILES['epl_picture']['name'];
	$target_dir = "C:/xampp/htdocs/LegacyYounitySystem/Employee Site/picture/".basename($image);
	$query = "UPDATE employee_information SET picture='".$image."' WHERE email='".$_SESSION['epl_email']."'";
	mysqli_query($con, $query);
  
    if (move_uploaded_file($_FILES['epl_picture']['tmp_name'], $target_dir)) {
  		$msg = "Image uploaded successfully";
  	}
	else{
  		$msg = "Failed to upload image";
  	}
   }
   //Select data from db
   $sqlemp = "SELECT * FROM employee_information WHERE email='".$_SESSION['epl_email']."' ";
   
   $retvalemp = mysqli_query($con, $sqlemp);
   
   //Test
   
   if(! $retvalemp ) {
      die('Could not get data: ' . mysql_error());
   }
   
   //Display data from db
   while($row = mysqli_fetch_assoc($retvalemp)) {
	    $_SESSION['epl_picture'] = $row['picture'];
   		$_SESSION['epl_username'] = $row['username'];
		$_SESSION['epl_ic'] = $row['ic'];
		$_SESSION['epl_contact'] = $row['contact'];
		$_SESSION['epl_email'] = $row['email'];
		$_SESSION['epl_gender'] = $row['gender'];
		$_SESSION['epl_dob'] = $row['dob'];
		$_SESSION['epl_status'] = $row['status'];
		
		if($_SESSION['epl_picture'] != null)
		{
			//Output Image
			//echo '<img src = "data:picture/;base64,'.base64_encode($_SESSION['epl_picture']).'" width= "30%" height = "30%" />';
			//while ($row = mysqli_fetch_array($result)) {
				echo "<div>";
				echo "<p align ='left'><img src='picture/".$_SESSION['epl_picture']."' width = '200px' height = '150px' />";
				echo "</div>";
			//}
		}		
		else if ($_SESSION['epl_picture'] == null)
		{	
			$genderdetect = $row['gender'];
			
			if($genderdetect == 'Male' || $genderdetect == 'male')
			{
				echo "<p align ='left'><img src='boy.jpg' alt='Male profile image' width='150px' height='150px' style='vertical-align:middle;margin:0px 50px'></p>";
			}
			else if ($genderdetect == 'Female' || $genderdetect == 'female')
			{
				echo "<p align='left'><img src='girl.jpg' alt='Girl profile image' width='150px' height='150px' style='vertical-align:middle;margin:0px 50px'></p>";
			}
		}
      echo "<p align = left>Username &nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['username']."</b><br></p>".
	 	 "<p align = left>Ic &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['ic']."</b><br></p>".
         "<p align = left>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['email']."</b><br></p>".
         "<p align = left>Contact &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['contact']."</b><br></p>".
		 "<p align = left>Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['gender']."</b><br></p>".
		 "<p align = left>Date of Birth &nbsp: <b>".$row['dob']."</b><br></p>".
		 "<p align = left>Status &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['status']."</b><br></p>";	
   }
?>
<tr><td></td><td align="center"><input type="submit" value="Submission Form"></td>
</form>

<!-- Form go to upload profile picture -->
<form action="uploadImg.php" method = "post">
<td></td><td align="center"><input type="submit" value="Upload Image""></td>
</form>

<!-- Form go to check submission -->
<form action="Emp_CheckSub.php" method = "post">
<td></td><td align="center"><input type="submit" value="Check Submission""></td>
</form>


<!-- Form back to login screen -->
<form action="Emp_Login.php" method = "post">
<td></td><td align="center"><input type="submit" value="LogOut" name="LogOut"></td></tr>
<?php
if(isset($_POST['LogOut'])== "LogOut")
{
	//Connect to DB
   $con = mysqli_connect('localhost','admin','','legacyyounity');
   //mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
    /*
	$update = "Update employee_information Set status = 'Not Active' Where username = '".$_SESSION['epl_username']."' ";
	mysqli_query($con, $update);
	*/
	unset($_SESSION);
	session_destroy();
}	 
?>
</form>

</table>

</DIV></center>

</body>
</html>