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
<DIV class="border"style="border: 1px solid grey; padding: 30px; width: 800px; height:200%">

<?php 
session_start();
$_SESSION['rarticle_id'] = $_POST['reviewarticle_id'];

echo "<h1><center>Article Details</center></h1>";
//Display date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['date'] = date("d-M-Y h:i a");
echo "<p align = left>Review Article Information Date & Time: <b>".date("d-M-Y h:i a")."</b><br></p>";
	//Connect to db
   $con = mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
   //Test
   if(!$con ) {
      die('Could not connect: ' . mysqli_error());
   }
   //Select data from db
   $sqlart = "SELECT * FROM article_information WHERE articleid = '".$_POST['reviewarticle_id']."'  ";
   $retvalart = mysqli_query($con,$sqlart);
   
   //Test
   if(! $retvalart ) {
      die('Could not get data: ' . mysql_error());
   }
   
	//Display data from db
	while($row = mysqli_fetch_assoc($retvalart)) {
	
		echo "<p align = left>Article Id : <b>".$row['articleid']."</b><br></p>".
         "<p align = left>Writter Name : <b>".$row['writter_name']."</b><br></p>".
         "<p align = left>Date : <b>".$row['date']."</b><br></p>".
         "<p align = left>Topic/Title : <b>".$row['title']."</b><br></p>".
		 "<p align = left>Link of Article : <b><a href = '".$row['link']."' target='_blank'>".$row['link']."</a></b><br></p>".
		 "<p align = left>Description: <b>".$row['description']."</b><br></p>".
		 "<p align = left>Word count of Description: <b>".$row['wordcount']."</b><br></p>";
		 
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
        	echo"<th align=center>Word</th>";
        	echo"<th align=center>Count</th>";
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
		 
		 echo'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
		 $starNumber = (isset($row['rating'])) ? $row['rating'] : 0;
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
		   
		 echo "<p align = left>Comment : <b>".$row['comment']."</b><br></p>";
	}

	echo "</table>";

?>

<form action="RemoveArticle.php" method = "post">
<table align="center" height="100px" width="500px" border=0>
<tr><td></td><td align="center"><input type="button" onclick = "myFunction()" value= "Remove Article" name = "remove_article" id = "remove_article"></td>
</form>

<script>
function myFunction() {
  var value = confirm("Confirm to remove this ariticle ? ");
  
  if(value == true)
  {
  	location.href = 'RemoveArticle.php';
  }
  
}
</script>


<form action="Excel.php" method = "post">
<td></td><td align="center"><input type="submit" value= "Export Article To Excel" name = "export_excel"></td>
</form>

<!-- Form action back to Home-->
<form action="Mng_Dashboard.php" method = "post">
<td></td><td align="center"><input type="submit" value= "Back To Dashboard"></td></tr>
</table>
</form>

</DIV></center>

</body>
</html>

