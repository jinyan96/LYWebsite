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
	table, thead, tbody, tr { width: 100%; }
</style>

<body style="font-family:calibri; font-size: 28px">
<center>
<DIV class="border"style="border: 3px solid grey; padding: 30px; width: 95%; height:200%">

<?php 
session_start();

echo "<h1><center>Employee Article Review List</center></h1>";
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
echo "<p align = left>Review Date & Time: <b>".$_SESSION['date']."</b><br></p>";
?>

<!-- Table for insert sort details -->
<table align = "center" height="50px" width="60%" border=0>
<tr align ="center"><td>Sort by Writer Name:</td>
<form action="Mng_Exp_ArtSort.php" method = "post">
  	<td><input type="search" name="writtername">
    <input type="submit"></td>
</form>

<td></td>

<td>Sort by Article Date:</td>
<form action="Mng_Exp_ArtSort.php" method = "post">
  <td><input type="date" name="articledate">
  <input type="submit"></td>
</form>

<td></td>

<td>Sort by Article Title:</td>
<form action="Mng_Exp_ArtSort.php" method = "post">
  <td><input type="search" name="articletitle">
  <input type="submit"></td></tr>
</form>

</table>

<?php
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlsta = "SELECT * FROM article_information";
   $retvalsta = mysqli_query($con,$sqlsta);
   
   //Test
   if(! $retvalsta ) {
      die('Could not get data: ' . mysql_error());
   }
   
	echo "<table align='center' height='200px' width='100%' border=1>";
	echo "<tr><td>Article ID</td><td>Writer Name</td><td>Article Date</td><td>Article Title</td><td>Article Submission Date</td></tr>";
	
	//Display data
	while($row = mysqli_fetch_assoc($retvalsta)) {
	
		echo "<tr><td>".$row['articleid']."</td><td>".$row['writter_name']."</td><td>".$row['date']."</td><td>".$row['title']."</td>
		<td>".$row['subdate']."</td></tr>";
	}

	echo "</table>";

?>

<!-- Form Export Excel of Ariticle -->
<form action="Excel.php" method = "post">
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="submit" value= "Export Article To Excel" name = "exportFull_excel"></td>
</form>

<!-- Form back to Home -->
<form action="Mng_Dashboard.php" method = "post">
<td></td><td align="center"><input type="submit" value= "Back To Dashboard"></td></tr>
</table>
</form>

</DIV></center>


</body>
</html>
