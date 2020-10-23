<?php
$username = $_POST['username'];
$email = $_POST['ermail'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

if (!empty($username) || !empty($email)  || !empty($message)) {
	$databaseHost = 'localhost';
	$databaseUsername = 'root'; 
	$databasePassword = '';
	$databaseName = 'test';
	//create connection
	$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	if (mysqli_connect_error()) {
	die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
} else {
	$SELECT = "SELECT email from register Where email = ? Limit 1";
	$INSERT = "INSERT Into register (username, email, mobile, message) values(?, ?, ?, ?)";

//prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;

if ($rnum==0) {
     $stmt->close();

     $stmt = $conn->prepare($INSERT);
     $stmt->bind_param("ssis", $username, $email, $mobile, $message);
     $stmt->excute();
     echo "Your message is submit successfully.";
} else {
    echo " You have exceed the limit. You already send message twice with this mail.";
}
    $stmt->close();
    $conn->close();
}
} else {
	echo "All field are required except optional.";
	die();
}
?>
