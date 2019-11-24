<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['course_search_submit']))
	{
	$courseNum = $courseName = $section = $classroom = "";

	//$courseName = mysqli_real_escape_string($conn, $_POST['courseName']);
	//$section = mysqli_real_escape_string($conn, $_POST['section']);
	//$classroom = mysqli_real_escape_string($conn, $_POST['classroom']);

	$courseIDtoEdit = [];
	$i = 0;

	$sql = "SELECT * FROM course WHERE((courseNum = '$_POST[courseNum]')";
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