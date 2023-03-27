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
	.star-rating__ico{
	padding-left: 2px;
	cursor: pointer;
	color: #FFB300;
	}
</style>

<body>
<center>
<DIV class="border"style="border: 1px solid grey; padding: 30px; width: 54%; height:200%">

<form action="Mng_Dashboard.php" method="post">
<?php 
session_start();

$_SESSION['a_rating'] = $_POST["rating"];
$_SESSION['a_comment'] = $_POST["article_comment"];

echo "<h1><center>Confirmation Action Details</center></h1>";
//Display date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");
echo "<p align = left>Confirmation Action Article Date & Time: <b>".date("d-M-Y h:i a")."</b><br></p>";
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlart = "SELECT * FROM article_information WHERE articleid = '".$_SESSION['carticle_id']."'  ";
   $retvalart = mysqli_query($con,$sqlart);
   
   //Test
   if(! $retvalart ) {
      die('Could not get data: ' . mysql_error());
   }
   
	//Display data from db
	while($row = mysqli_fetch_assoc($retvalart)) {
	
		echo "<p align = left>Article Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['articleid']."</b><br></p>".
         "<p align = left>Writer Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['writter_name']."</b><br></p>".
         "<p align = left>Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['date']."</b><br></p>".
         "<p align = left>Topic/Title &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['title']."</b><br></p>".
		 "<p align = left>Link of Article &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b><a href = '".$row['link']."' target='_blank'>".$row['link']."</a></b><br></p>".
		 "<p align = left>Description &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <b>".$row['description']."</b><br></p>".
		 "<p align = left>Word count of Description : <b>".$row['wordcount']."</b><br></p>";
		 
		 $englishwords = strtolower($row['description']);
			$chinesewords=($row['description']);
			$english = preg_replace("/[^ '\w]+/","", $englishwords);
			$chinese = preg_replace(array('/[^\p{Han}？]/u', '/(\s)+/'), array('', '$1'), $chinesewords);
			$engwords=explode(" ", $english);
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
			if (!preg_match('/^[a-z0-9 .}, !@#$%^&*()_+|\';?><-]+$/i', $chinesewords ,$englishwords)) {
			foreach ($result2 as $word => $count) {
			echo"</tr>";
			echo"<td> $word</td>";
    		echo"<td> $count</td>";
			echo"</tr>";
			}
			foreach($result as $word => $count) {
				echo"</tr>";
					echo"<td> $word</td>";
    				echo"<td> $count</td>";
				echo"</tr>";
				}
			}
			else if(preg_match('/\p{Han}+/u', $chinesewords)){
			foreach ($result2 as $word => $count) {
				echo"</tr>";
					echo"<td> $word</td>";
    				echo"<td> $count</td>";
				echo"</tr>";
				}
			}
			else {
  			foreach($result as $word => $count) {
				echo"</tr>";
					echo"<td> $word</td>";
    				echo"<td> $count</td>";
				echo"</tr>";
				}
			}
			
		 echo"<p align = left>Submission Date : <b>".$row['subdate']."</b><br></p>";
	}
	
	echo "<hr>";
		
	echo'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
	$starNumber = (isset($_SESSION['a_rating'])) ? $_SESSION['a_rating'] : 0;
	echo"<p align = left>Rating :";
	for( $x = 0; $x < 5; $x++ )
    {  
        if( floor($starNumber)-$x >= 1 )
        { echo '<i class="star-rating__ico fa fa-star fa-2x"style="color:yellow"></i>'; }
        elseif( $starNumber-$x > 0 )
        { echo '<i class="star-rating__ico fa fa-star-half-o fa-2x"></i>'; }
        else
        { echo '<i class="star-rating__ico fa fa-star-o fa-2x"></i>';}
    }
	
	echo "<p align = left>Comment : <b>".$_SESSION['a_comment']."</b><br></p>";	
	
	echo "</table>";
?>

<!--Insert For manager rating and comment -->
<?php
	//Connect to db
	$con=mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
	//Update data to db
	$querysta ="UPDATE article_information
				SET rating = '".$_SESSION['a_rating']."', comment = '".$_SESSION['a_comment']."'
				WHERE articleid = '".$_SESSION['carticle_id']."' ";
			
		
	//Test
	//Insert data to db
	mysqli_query($con,$querysta);
	
	/*
	if (!mysqli_query($con,$querysta))
	{
		echo'Not Inserted';
	}
	else
	{
		echo'Inserted';
	}
	*/
	
?>
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="submit" value= "Confirm"></td></tr>
</table>

</form>

</DIV></center>

</body>
</html>