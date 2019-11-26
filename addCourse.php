<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['course_submit']))
    {
    $courseNum = $courseName = $section = $days = $times = $classroom = "";
	
	$courseNum = $_POST['courseNum'];
	$courseName = $_POST['courseName'];
	$section = $_POST['section'];
    $days = $_POST['daysTaught'];
	$times = $_POST['timeTaught'];
	$classroom = $_POST['classroom'];
	
    $sql = "INSERT INTO course VALUES(NULL, '$courseNum', '$courseName', '$section', '$days', '$times', '$classroom')";

    $retval = mysqli_query($conn, $sql);
    
	$url = "http://localhost/4660Project/menu.html";
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