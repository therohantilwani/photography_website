<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$subject = $_POST['subject'];

	// Database connection
	$conn = new mysqli('localhost','root','','photography');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(firstname, lastname, email, country, subject) values(?, ?, ?, ?, ?);");
		$stmt->bind_param("sssss", $firstname, $lastname, $email, $country, $subject);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>