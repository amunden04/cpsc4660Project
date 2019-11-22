<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['course_submit']))
    {
    $section = $days = $times = $classroom = "";
	
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $days = mysqli_real_escape_string($conn, $_POST['daysTaught']);
	$times = mysqli_real_escape_string($conn, $_POST['timeTaught']);
	$classroom = mysqli_real_escape_string($conn, $_POST['classroom']);
	
    $sql = "INSERT INTO course VALUES(NULL, '$section', '$days', '$times', '$classroom')";

    $retval = mysqli_query($conn, $sql);
    
	$url = "http://localhost/cpsc4660Project/AddCourse.html";
	if($retval){
		header("Location: $url");
	exit;
	} else {
		echo "Error.";
		die();
	}
	
	mysqli_close($conn);
}

?>