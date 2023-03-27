<html>
<head><title>Legacy Younity Sdn Bhd</title></head>
<style>
	body{
		background-image: url("managerbackground.jpg");
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
<DIV class="border"style="border: 3px solid grey; padding: 30px; width: 95%; height:200%">

<form action="Mng_R_Action.php" method="post">
<?php 
session_start();

echo "<h1><center>Employee Article Sorted List</center></h1>";
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Sorted Review Date & Time: <b>".$_SESSION['date']."</b><br></p>";

if(isset($_POST['c_writtername']))
{
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlsta = "SELECT * FROM article_information where writter_name = '".$_POST['c_writtername']."' AND rating = 0 ";
   $retvalsta = mysqli_query($con,$sqlsta);
   
   //Test
   if(! $retvalsta ) {
      die('Could not get data: ' . mysql_error());
   }
   
	echo "<table align='center' height='200px' width='100%' border=1>";
	echo "<tr><td>Article ID</td><td>Writter Name</td><td>Article Date</td><td>Article Title</td><td>Article Submission Date</td><td>To View Article Information</td></tr>";
	
	//Display data
	while($row = mysqli_fetch_assoc($retvalsta)) {
	
		echo "<tr><td>".$row['articleid']."</td><td>".$row['writter_name']."</td><td>".$row['date']."</td><td>".$row['title']."</td>
		<td>".$row['subdate']."</td><td><input type='submit' value = '".$row['articleid']."' name = 'commentarticle_id'></td></tr>";
	}

	echo "</table>";
}

if(isset($_POST['c_articledate']))
{
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlsta = "SELECT * FROM article_information where date = '".$_POST['c_articledate']."' AND rating = 0 ";
   $retvalsta = mysqli_query($con,$sqlsta);
   
   //Test
   if(! $retvalsta ) {
      die('Could not get data: ' . mysql_error());
   }
   
	echo "<table align='center' height='200px' width='100%' border=1>";
	echo "<tr><td>Article ID</td><td>Writter Name</td><td>Article Date</td><td>Article Title</td><td>Article Submission Date</td><td>To View Article Information</td></tr>";
	
	//Display data
	while($row = mysqli_fetch_assoc($retvalsta)) {
	
		echo "<tr><td>".$row['articleid']."</td><td>".$row['writter_name']."</td><td>".$row['date']."</td><td>".$row['title']."</td>
		<td>".$row['subdate']."</td><td><input type='submit' value = '".$row['articleid']."' name = 'commentarticle_id'></td></tr>";
	}

	echo "</table>";
}

if(isset($_POST['c_articletitle']))
{
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlsta = "SELECT * FROM article_information where title = '".$_POST['c_articletitle']."' AND rating = 0 ";
   $retvalsta = mysqli_query($con,$sqlsta);
   
   //Test
   if(! $retvalsta ) {
      die('Could not get data: ' . mysql_error());
   }
   
	echo "<table align='center' height='200px' width='100%' border=1>";
	echo "<tr><td>Article ID</td><td>Writter Name</td><td>Article Date</td><td>Article Title</td><td>Article Submission Date</td><td>To View Article Information</td></tr>";
	
	//Display data
	while($row = mysqli_fetch_assoc($retvalsta)) {
	
		echo "<tr><td>".$row['articleid']."</td><td>".$row['writter_name']."</td><td>".$row['date']."</td><td>".$row['title']."</td>
		<td>".$row['subdate']."</td><td><input type='submit' value = '".$row['articleid']."' name = 'commentarticle_id'></td></tr>";
	}

	echo "</table>";
}
?>
</form>

<!-- Form back to Home -->
<form action="Mng_Dashboard.php" method = "post">
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="submit" value= "Back To Dashboard"></td></tr>
</table>
</form>

</DIV></center>



</body>
</html>
