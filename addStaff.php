<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['staff_submit']))
    {
    $username = $password = $first_name = $last_name = $address = $city = $province = $phone = $postCode = $dob = "";
	$gender = '';
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	$first_name = mysqli_real_escape_string($conn, $_POST['fName']);
	$last_name = mysqli_real_escape_string($conn, $_POST['lName']);
	$address = mysqli_real_escape_string($conn, $_POST['streetName']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$postCode = mysqli_real_escape_string($conn, $_POST['postCode']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "INSERT INTO faculty VALUES(NULL, '$username', '$password', '$first_name', '$last_name', '$address', '$city', '$province', '$postCode', '$phone', '$dob', '$gender', NULL)";

    $retval = mysqli_query($conn, $sql);
    
	$url = "http://localhost/cpsc4660Project/AddStaff.html";
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