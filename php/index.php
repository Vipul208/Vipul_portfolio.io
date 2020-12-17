<?php
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$messag = $_POST['messag'];

if(!empty($username)){
	//create connection
	$conn = new mysqli('localhost', 'root', '', 'dscproject'); 
	if (mysqli_connect_error()) {
	die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
} else {
	$sql = "INSERT INTO register (username, email, mobile, messag ) values('$username', '$email', '$mobile', '$messag')";
if($conn->query($sql)){
  echo"Your message record sucessfully";
}
else{
  echo "Error". $sql . "<br>". $conn->error;
}
$conn->close();
}
}else {
	echo "username should not be empty";
	die();
}
?>