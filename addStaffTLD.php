<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['staff_submit']))
    {
    $username = $password = $first_name = $last_name = $address = $city = $province = $phone = $postCode = $dob = "";
	$gender = '';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
	$first_name = $_POST['fName'];
	$last_name = $_POST['lName'];
	$address = $_POST['streetName'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$postCode = $_POST['postCode'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];

    $sql = "INSERT INTO faculty VALUES(NULL, '$username', '$password', '$first_name', '$last_name', '$address', '$city', '$province', '$postCode', '$phone', '$dob', '$gender', NULL)";

    $retval = mysqli_query($conn, $sql);
    
	$url = "http://localhost/4660Project/menuTypeLengthDetection.html";
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