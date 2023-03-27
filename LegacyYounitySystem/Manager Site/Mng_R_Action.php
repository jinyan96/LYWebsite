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
	.star-rating{
	font-size: 0;
	}
	.star-rating__wrap{
		display: inline-block;
		font-size: 1rem;
	}
	.star-rating__wrap:after{
		content: "";
		display: table;
		clear: both;
	}
	.star-rating__ico{
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #FFB300;
	}
	.star-rating__ico:last-child{
		padding-left: 0;
	}
	.star-rating__input{
		display: none;
	}
	.star-rating__ico:hover:before,
	.star-rating__ico:hover ~ .star-rating__ico:before,
	.star-rating__input:checked ~ .star-rating__ico:before
	{
		content: "\f005";
	}
</style>

<body>

<center><DIV class = "border" style="border: 1px solid grey;padding:30px; width:54%; height: 200%" >

<form action="Mng_R_ConfirmAct.php" method="post">
<?php 
session_start();
$_SESSION['carticle_id'] = $_POST['commentarticle_id'];

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
   $sqlart = "SELECT * FROM article_information WHERE articleid = '".$_POST['commentarticle_id']."'  ";
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
	
?>

<table align="center" height="100px" width="500px" border=0>
<hr>
<!-- To insert rating and comment -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="star-rating">
    <div class="star-rating__wrap">
	  <p align= left>Rating:
        <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
        <label class="star-rating__ico fa fa-star-o fa-2x" for="star-rating-5" title="5 out of 5 stars"></label>
        <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
        <label class="star-rating__ico fa fa-star-o fa-2x" for="star-rating-4" title="4 out of 5 stars"></label>
        <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
        <label class="star-rating__ico fa fa-star-o fa-2x" for="star-rating-3" title="3 out of 5 stars"></label>
        <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
        <label class="star-rating__ico fa fa-star-o fa-2x" for="star-rating-2" title="2 out of 5 stars"></label>
        <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
        <label class="star-rating__ico fa fa-star-o fa-2x" for="star-rating-1" title="1 out of 5 stars"></label>
    </div>
</div>

<p align = left>Comment: <textarea rows="2" cols="100%" name="article_comment"></textarea></p>

	
<center><input type="submit" value="SUBMIT"></center>
</table>

</DIV>

</body>
</html>