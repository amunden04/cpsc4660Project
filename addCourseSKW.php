<?php
	include 'connectdb.php';
	include 'SKWFunction.php';
    $conn = connect_sql();

    if (isset($_POST['course_submit']))
    {
	$temp1 = $temp2 = $temp3 = $temp4 = $temp5 = $temp6 = "";
    $courseNum = $courseName = $section = $days = $times = $classroom = "";
	$temp1 = $_POST['courseNum'];
	$temp2 = $_POST['courseName'];
	$temp3 = $_POST['section'];
	$temp4 = $_POST['daysTaught'];
	$temp5 = $_POST['timeTaught'];
	$temp6 = $_POST['classroom'];

	$courseNum = skw($temp1);
	$courseName = skw($temp2);
	$section = skw($temp3);
    $days = skw($temp4);
	$times = skw($temp5);
	$classroom = skw($temp6);
	
    $sql = "INSERT INTO course VALUES(NULL, '$courseNum', '$courseName', '$section', '$days', '$times', '$classroom')";

    $retval = mysqli_query($conn, $sql);
    
	$url = "http://localhost/4660Project/menuSensitiveKeyWord.html";
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