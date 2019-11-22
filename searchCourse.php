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

	if (isset($_POST['course_search_submit']))
	{
	$courseNum = $courseName = $section = $classroom = "";
	$course_id = 0;

	$course_id = mysqli_real_escape_string($conn, $_POST['courseID']);
	$courseNum = mysqli_real_escape_string($conn, $_POST['courseNum']);
	$courseName mysqli_real_escape_string($conn, $_POST['courseName']);
	$section = mysqli_real_escape_string($conn, $_POST['section']);
	$classroom = mysqli_real_escape_string($conn, $_POST['classroom']);

	$courseIDtoEdit = [];
	$i = 0;

	$sql = "SELECT * FROM course WHERE((courseID = '$course_id') OR (courseNum = '$courseNum') OR (courseName = '$courseName')
			OR (section = '$section') OR (classroom = '$classroom'))";	
			
	$result = mysqli_query($conn, $sql);

	if (! $result) 
	die ('could not get data: ' . mysqli_error($conn));

	if( mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result))
		{
			$i = 0;
			$courseIDtoEdit[$i] = ($row['courseID']);
			echo "<form method='post' action='UpdateCustomer.php'>";
			echo "<input type='hidden' name='courseID' value= $courseIDtoEdit[$i]>";
            echo "<tr>"."<td>" . $row["courseID"] . "</td>" .
			"<td>" . $row["courseNum"] . "</td>" .
			"<td>" . $row["courseName"] . "</td>" .
			"<td>" . $row["section"] . "</td>" .
			"<td>" . $row["daysTaught"] . "</td>" .
			"<td>" . $row["timeTaught"] . "</td>" .
			"<td>" . $row["classroom"] . "</td>" . "</form>" . "</td>" .
			"</tr>";
			$i = ($i+1);
			
		}
	 } else {
			echo "0 Results";
		}
	}
		mysqli_close($conn);

?>
</table>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='menu.html'" />

</html>