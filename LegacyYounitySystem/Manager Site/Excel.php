<?php
session_start();
$con=mysqli_connect('localhost', 'admin', '');
mysqli_select_db($con,'legacyyounity');

$output = '';

if(isset($_POST["export_excel"]))
{
	$sql = "SELECT * from article_information where articleid = '".$_SESSION['rarticle_id']."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		$output .= '
			<table class = "table" bordered = "1">
				<tr>
					<th>Article ID </th>
					<th>Writter Name </th>
					<th>Article Date </th>
					<th>Article Title </th>
					<th>Article Link </th>
					<th>Article Description </th>
					<th>Word Count Description </th>
					<th>Article Submission Date </th>
					<th>Article Rating </th>
					<th>Article Comment </th>
				</tr>
		';
		
		while ($row = mysqli_fetch_array($result))
		{
			$output .= '
			<table class = "table" bordered = "1">
				<tr>
					<td>'.$row["articleid"].'</td>
					<td>'.$row["writter_name"].'</td>
					<td>'.$row["date"].'</td>
					<td>'.$row["title"].'</td>
					<td>'.$row["link"].'</td>
					<td>'.$row["description"].'</td>
					<td>'.$row["wordcount"].'</td>
					<td>'.$row["subdate"].'</td>
					<td>'.$row["rating"].' star </td>
					<td>'.$row["comment"].'</td>
				</tr>
			';
		}
		$output .= '</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=article.xls");
		echo $output;
	}
}

if(isset($_POST["exportFull_excel"]))
{
	$sql = "SELECT * from article_information";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		$output .= '
			<table class = "table" bordered = "1">
				<tr>
					<th>Article ID </th>
					<th>Writter Name </th>
					<th>Article Date </th>
					<th>Article Title </th>
					<th>Article Link </th>
					<th>Article Description </th>
					<th>Word Count Description </th>
					<th>Article Submission Date </th>
					<th>Article Rating </th>
					<th>Article Comment </th>
				</tr>
		';
		
		while ($row = mysqli_fetch_array($result))
		{
			$output .= '
			<table class = "table" bordered = "1">
				<tr>
					<td>'.$row["articleid"].'</td>
					<td>'.$row["writter_name"].'</td>
					<td>'.$row["date"].'</td>
					<td>'.$row["title"].'</td>
					<td>'.$row["link"].'</td>
					<td>'.$row["description"].'</td>
					<td>'.$row["wordcount"].'</td>
					<td>'.$row["subdate"].'</td>
					<td>'.$row["rating"].' star </td>
					<td>'.$row["comment"].'</td>
				</tr>
			';
		}
		$output .= '</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=Full_article.xls");
		echo $output;
	}
}

?>