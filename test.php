<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main-style.css">
	</head>	

<body>
<br><center><h3>Results</h3></center><br>

<table id = "tables">
	<tr>
        <th>Course ID</th>
		<th>Course Number</th>
		<th>Course Name</th>
        <th>Section</th>
        <th>Days</th>
		<th>Times</th>
		<th>Classroom</th>
	</tr>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

	function mres($value){
		$search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
		$replace = array("\\\\", "\\0", "\\n", "\\r", "\\'", '\\"', "\\z");
		return str_replace($search, $replace, $value);
	}
	
	if (isset($_POST['course_search_submit']))
	{
		$temp = $courseName = "";
		$temp = $_POST['courseName'];
		$courseName = mres($temp);
		echo gettype($courseName);
		echo " ";
		echo $courseName;
		$sql = "SELECT * FROM course WHERE courseName LIKE '%".$courseName."%'";
		$result = mysqli_query($conn, $sql);
	
		if (! $result) 
		die ('could not get data: ' . mysqli_error($conn));
	
		if( mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>"."<td>" . $row["courseID"] . "</td>" .
				"<td>" . $row["courseNum"] . "</td>" .
				"<td>" . $row["courseName"] . "</td>" .
				"<td>" . $row["section"] . "</td>" .
				"<td>" . $row["daysTaught"] . "</td>" .
				"<td>" . $row["timeTaught"] . "</td>" .
				"<td>" . $row["classroom"] . "</td>" . "</form>" . "</td>" .
				"</tr>";
				
			}
		 } else {
				echo "0 Results";
			}
		}
			mysqli_close($conn);
	
?>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='menu.html'" />

</html>