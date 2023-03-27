<html>
<head>
	<title>Legacy Younity Sdn Bhd</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	
	.blink {
	-webkit-animation: blink .75s linear infinite;
	-moz-animation: blink .75s linear infinite;
	-ms-animation: blink .75s linear infinite;
	-o-animation: blink .75s linear infinite;
	 animation: blink .75s linear infinite;
	}
	@-webkit-keyframes blink {
		0% { opacity: 1; }
		50% { opacity: 1; }
		50.01% { opacity: 0; }
		100% { opacity: 0; }
	}
	@-moz-keyframes blink {
		0% { opacity: 1; }
		50% { opacity: 1; }
		50.01% { opacity: 0; }
		100% { opacity: 0; }
	}
	@-ms-keyframes blink {
		0% { opacity: 1; }
		50% { opacity: 1; }
		50.01% { opacity: 0; }
		100% { opacity: 0; }
	}
	@-o-keyframes blink {
		0% { opacity: 1; }
		50% { opacity: 1; }
		50.01% { opacity: 0; }
		100% { opacity: 0; }
	}
	@keyframes blink {
		0% { opacity: 1; }
		50% { opacity: 1; }
		50.01% { opacity: 0; }
		100% { opacity: 0; }
	}
	p{
		font-size: 20px;
	}
</style>

<body>

<center><DIV class = "border" style="border: 3px solid grey;padding:30px; width:800px; height: 200%" >
<h1><center>Employee Submission Confirmation</center></h1>

<form action="Emp_Dashboard.php" method="post">
<table align="center" height="100px" width="500px" border=0>

<!--Display-->
<?php
session_start();
//Display Date
$timezone="Asia/Kuala_Lumpur";
date_default_timezone_set($timezone);
$_SESSION['sub_date'] = date("d-M-Y h:i a");
echo "<p align = left>Date and Time of Submission: <b>".date("d-M-Y h:i a")."</p></b>";

//Pass to global variable
$_SESSION['epl_writtername'] = $_POST["emp_writtername"];
$_SESSION['epl_subdate'] = $_POST["emp_subdate"];
$_SESSION['epl_subtitle'] = $_POST["emp_subtitle"];
$_SESSION['epl_sublink'] = $_POST["emp_sublink"];
$_SESSION['epl_subdescription'] = addslashes($_POST["emp_subdescription"]);
//Random Method for Invoice no
$a=10; 
function randomName($a) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $a; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
 
 
$ArticleNo = randomName($a);
$_SESSION['articleid'] = $ArticleNo;

$wordcount = str_word_count(stripslashes($_SESSION['epl_subdescription']));



echo "<p align = left>Article Id: <b>".$_SESSION['articleid']."</b><br></p>";
echo "<p align = left>Writer Name: <b>".$_SESSION['epl_writtername']."</b><br></p>";
echo "<p align = left>Date: <b>".$_SESSION['epl_subdate']."</b><br></p>";
echo "<hr>";
echo "<p align = left>Topic/Title: <b>".$_SESSION['epl_subtitle']."</b><br></p>";
echo "<p align = left>Link of Article: <b><a href = '".$_SESSION['epl_sublink']."' target='_blank'>".$_SESSION['epl_sublink']."</a></b><br></p>";
echo "<p align = left>Description: <b>".stripslashes($_SESSION['epl_subdescription'])."</b><br></p>";
echo "<p align = left>Word count of Description (excluded punctuation): <b>".$wordcount."</b><br></p>";

$englishwords = strtolower($_SESSION['epl_subdescription']);
$chinesewords=($_SESSION['epl_subdescription']);
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
?>
	</table><br>

<table align="center" height="200px" width="400px" border=0>
<tr><input type="submit" value="SUBMIT REQUEST" name="submit_request"></tr>
<p class="tab blink" align="center" style="color:red; font-size:20px">Confirm your submission form !!!<br></p>
</table>


<!--Insert For Article Information into database table-->
<?php
	//Connect to db
	$con=mysqli_connect('localhost','admin','');
	mysqli_select_db($con,'legacyyounity');
	
	//Test
	
	if(!$con)
	{
		echo'Not connected to server';
	}
	if (!mysqli_select_db($con,'legacyyounity'))
	{
		echo'Database Not selected';
	}
	
	//Select data to insert	
	$sqlart ="INSERT INTO article_information (articleid,accountname,writter_name,date,title,link,description,subdate, wordcount) 
	VALUES ('".$_SESSION['articleid']."','".$_SESSION['epl_username']."','".$_SESSION['epl_writtername']."','".$_SESSION['epl_subdate']."','".$_SESSION['epl_subtitle']."',
	 '".$_SESSION['epl_sublink']."','".$_SESSION['epl_subdescription']."','".$_SESSION['sub_date']."', $wordcount)";
			
		
	//Test
	mysqli_query($con,$sqlart);
	/*
	if (!mysqli_query($con,$sqlsta))
	{
		echo'Not Inserted';
	}
	else
	{
		echo'Inserted';
	}
	*/
	
?>

</table>
</DIV></center>

</body>
</html>

