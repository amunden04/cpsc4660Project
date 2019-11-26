<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main-style.css">
	</head>	

<body>
<br><center><h3>Results</h3></center><br>

<table id = "tables">
	<tr>
        <th>Student ID</th>
        <th>Username</th>
        <th>Password</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Street Name</th>
		<th>City</th>
		<th>Province</th>
		<th>Postal Code</th>
        <th>Phone Number</th>
        <th>Date of Birth</th>
        <th>Gender</th>
	</tr>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['student_search_submit']))
	{
	$lastName = "";
	$lastName = mysqli_real_escape_string($conn, $_POST['lName']);

	$sql = "SELECT * FROM student WHERE lName LIKE '%".$lastName."%'";	
				
	$result = mysqli_query($conn, $sql);

	if (! $result) 
	die ('could not get data: ' . mysqli_error($conn));

	if( mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result))
		{
		    echo "<tr>"."<td>" . $row["StudentID"] . "</td>" .
            "<td>" . $row["Usernames"] . "</td>" .
			"<td>" . $row["Passwords"] . "</td>" .
			"<td>" . $row["fName"] . "</td>" .
			"<td>" . $row["lName"] . "</td>" .		
			"<td>" . $row["streetName"] . "</td>" .
			"<td>" . $row["city"] . "</td>" .
			"<td>" . $row["province"] . "</td>" .
			"<td>" . $row["postCode"] . "</td>" .
            "<td>" . $row["Phone"] . "</td>" .
            "<td>" . $row["DOB"] . "</td>" .
			"<td>" . $row["gender"] . "</td>" . "</form>" . "</td>" .
			"</tr>";		
		}
	 } else {
			echo "0 Results";
		}
	}
		mysqli_close($conn);

?>
</table>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='menuSensitiveKeyWord.html'" />

</html>