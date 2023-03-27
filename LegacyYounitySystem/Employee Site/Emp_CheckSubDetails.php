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

<body>
<center>
<DIV class="border"style="border: 1px solid grey; padding: 30px; width: 50%; height:200%">

<?php 
session_start();

echo "<h1><center>Article Submission Details</center></h1>";
//Display date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");
echo "<p align = left>Check Article Information Date & Time: <b>".date("d-M-Y h:i a")."</b><br></p>";
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlart = "SELECT * FROM article_information WHERE articleid = '".$_POST['checkarticle_id']."'  ";
   $retvalart = mysqli_query($con,$sqlart);
   
   //Test
   if(! $retvalart ) {
      die('Could not get data: ' . mysql_error());
   }
   
	//Display data from db
	while($row = mysqli_fetch_assoc($retvalart)) {
	
		echo "<p align = left>Article Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['articleid']."</b><br></p>".
         "<p align = left>Writer Name &nbsp&nbsp: <b>".$row['writter_name']."</b><br></p>".
         "<p align = left>Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['date']."</b><br></p>".
         "<p align = left>Topic/Title &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['title']."</b><br></p>".
		 "<p align = left>Link of Article : <b><a href = '".$row['link']."' target='_blank'>".$row['link']."</a></b><br></p>".
		 "<p align = left>Description &nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['description']."</b><br></p>";
		 echo "<p align = left>Word count of Description (excluded punctuation): <b>".$row['wordcount']."</b><br></p>";
$englishwords = strtolower($row['description']);
$chinesewords=($row['description']);
$english = preg_replace("/[^ '\w]+/", '', $englishwords);
$chinese = preg_replace(array('/[^\p{Han}？]/u', '/(\s)+/'), array('', '$1'), $chinesewords);
$engwords=explode(' ', $english);
$result = array_combine($engwords, array_fill(0, count($engwords), 0));
$chiwords=preg_split('/(?<!^)(?!$)/u', $chinese);
$result2 = array_combine($chiwords, array_fill(0, count($chiwords), 0));

foreach($chiwords as $word) {
    $result2[$word]++;
}
foreach($engwords as $word) {
    $result[$word]++;
}
echo'<table border=" " width="60%">';
    echo"<tr>";
        echo"<th align=left>Word</th>";
        echo"<th align=left>Count</th>";
    echo"</tr>";

if (preg_match('/\p{Han}+/u' ,$chinesewords) && (preg_match('/[^A-Za-z0-9]/',$englishwords))){
foreach ($result2 as $word => $count) {
echo"</tr>";
	echo"<td> $word</td>";
    echo"<td> $count</td>";
echo"</tr>";
	}
	
foreach($result as $word => $count) {
if($word == "")
echo"</tr>";
	echo"<td> $word</td>";
    echo"<td> $count</td>";
echo"</tr>";
	}
}
else if (preg_match('/\p{Han}+/u' ,$chinesewords) && (!preg_match('/[^A-Za-z0-9]/',$englishwords)))
{
	foreach ($result2 as $word => $count) {
	echo"</tr>";
		echo"<td> $word</td>";
	    echo"<td> $count</td>";
	echo"</tr>";
		
	}
}
else 
{
	foreach($result as $word => $count) {
	echo"</tr>";
		echo"<td> $word</td>";
	    echo"<td> $count</td>";
	echo"</tr>";
		}
}
			
		 echo "<p align = left>Submission Date : <b>".$row['subdate']."</b><br></p>".
		 "<p align = left>Comment : <b>".$row['comment']."</b><br></p>";
	}

	echo "</table>";

?>
<!-- Form action back to Home-->
<form action="Emp_Dashboard.php" method = "post">
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="submit" value= "Back To Dashboard"></td></tr>
</table>
</form>

</DIV></center>

</body>
</html>

