<html>
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
	tr,td{
		text-align: center;
		font-size: 15px;
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

<body style="font-family:calibri; font-size: 28px">
<center>
<DIV class="border"style="border: 1px solid grey; padding: 30px; width: 95%; height:100%">
<form action="Emp_CheckSubDetails.php" method="post">
<?php 
session_start();

echo "<h1><center>Employee Submission List </center></h1>";
//Display date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");
echo "<p align = left>Check Submission Date & Time: <b>".date("d-M-Y h:i a")."</b><br></p>";
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlemp = "SELECT * FROM article_information WHERE accountname = '".$_SESSION['epl_username']."' ";
   $retvalemp = mysqli_query($con,$sqlemp);
   
   //Test
   if(! $retvalemp ) {
      die('Could not get data: ' . mysql_error());
   }
   
   echo "<table align='center' height='200px' width='80%' border=1>";
echo "<tr><td>Article ID</td><td>Writter Name</td><td>Date</td><td>Title</td><td>Click To View Article Information</td></tr>";

	//Take data from database
while($row = mysqli_fetch_assoc($retvalemp)) {

	echo "<tr><td>".$row['articleid']."</td><td>".$row['writter_name']."</td><td>".$row['date']."</td>
	<td>".$row['title']."</td>
	<td><input type='submit' value = '".$row['articleid']."' name = 'checkarticle_id'></td></tr>";
}

	echo "</table>";

?>
</form>

<!-- Form action back to Home-->
<form action="Emp_Dashboard.php" method = "post">
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="submit" value= "Back To Dashboard"></td></tr>
</table>
</form>

</DIV></center>

</body>
</html>

