<?php
	include 'connectdb.php';
	include 'SKWFunction.php';
    $conn = connect_sql();

    if (isset($_POST['student_submit']))
    {
	$temp1 = $temp2 = $temp3 = $temp4 = $temp5 = $temp6 = "";
	$temp7 = $temp8 = $temp9 = $temp10 = "";
	$temp11 = '';
    $username = $password = $first_name = $last_name = $address = $city = $province = $phone = $postCode = $dob = "";
	$gender = '';

	$temp1 = $_POST['username'];
	$temp2 = $_POST['password'];
	$temp3 = $_POST['fName'];
	$temp4 = $_POST['lName'];
	$temp5 = $_POST['streetName'];
	$temp6 = $_POST['city'];
	$temp7 = $_POST['province'];
	$temp8 = $_POST['postCode'];
	$temp9 = $_POST['phone'];
	$temp10 = $_POST['dob'];
	$temp11 = $_POST['gender'];
	
    
    $username = skw($temp1);
    $password = skw($temp2);
	$first_name = skw($temp3);
	$last_name = skw($temp4);
	$address = skw($temp5);
	$city = skw($temp6);
	$province = skw($temp7);
	$postCode = skw($temp8);
	$phone = skw($temp9);
	$dob = skw($temp10);
	$gender = skw($temp11);

    $sql = "INSERT INTO student VALUES(NULL, '$username', '$password', '$first_name', '$last_name', '$address', '$city', '$province', '$postCode', '$phone', '$dob', '$gender', NULL)";

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