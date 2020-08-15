<?php include 'connection.php';?>
<?php
if(isset($_POST['submit'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['tel']);
	$dob = strip_tags($_POST['dob']);
	$pincode= strip_tags($_POST['pincode']);
	
	$name = $connect->real_escape_string($name);
	$email = $connect->real_escape_string($email);
	$phone = $connect->real_escape_string($phone);
	$dob = $connect->real_escape_string($dob);
	$pincode = $connect->real_escape_string($pincode);
	
	
	$check_email = $connect->query("SELECT email FROM users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO users(name, email, phone, dob, pincode) VALUES('$name','$email','$phone', '$dob', '$pincode')";
		if ($connect->query($query)) {

			echo "<div style='color:#73AD21;text-align:center; padding: 7px'> Data submitted successfully!</div>";

		}else {
			echo "<div style='color:red;text-align:center;padding: 7x'>Error occured while submitting your data. Please try again</div>".$connect->connect_errno;
		}
		
	} else {
		
		
		echo "<div style='color:red;text-align:center;padding: 7px'>Sorry this email is already taken!</div>";
			
	}


	$connect->close();
}
?>
