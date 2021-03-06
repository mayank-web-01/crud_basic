project_crud/index.php                                                                              0000644 0000000 0000000 00000003120 13715546213 014062  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   <?php include 'server.php';?>

    <title>HTML CSS Form Validation</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
    <!---Name, Email Id, Mobile No., Date of Birth, Pin Code-->
    <form action="index.php" method="POST" enctype="multipart/form-data">
      <div>
        <input type="text" name="name" id="name" placeholder=" " required />
        <label for="name">Name</label>
      </div>
      <div>
        <input type="email" name="email" id="email" placeholder="Email Address" required />
        <div class="requirements">Must be a valid email addres!</div>
      </div>
      <div>
        <input
          type="tel"
          name="tel"
          id="tel"
          placeholder="Phone No"
          pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$"
          required
        />
        <div class="requirements">Must be a valid Phone Number!</div>
      </div>
      <div>
        <input
          type="tel"
          name="dob"
          id="tel"
          placeholder="Date Of Birth (dd/mm/yyyy)"
          pattern="[0-9]{1,2}/[0-9]{1,2}/[0-9]{4}"
          required
        />
        <div class="requirements">Must be a valid Date of birth!</div>
      </div>
      <div>
        <input
          type="tel"
          name="pincode"
          id="tel"
          placeholder="Pincode"
          pattern="[0-9]{6}"
          maxlength="6"
          required
        />
        <div class="requirements">Must be a valid pincode!</div>
      </div>

      <input type="submit" name="submit" value="Submit Data" />
    </form>
  </body>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                project_crud/server.php                                                                             0000644 0000000 0000000 00000002312 13715546213 014263  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   <?php include 'connection.php';?>
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
                                                                                                                                                                                                                                                                                                                      project_crud/style.css                                                                              0000644 0000000 0000000 00000007412 13715546213 014124  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   body {
	margin-top: 15%;
  background-color: darkslategrey;
  font-family: Arial;
	padding: 20px;
}
 
*{
	box-sizing: border-box;
}
 
form{
	max-width: 450px;
	margin: 0 auto;
}
 
form > div{
	margin-top: 5px;
	position: relative;
	background: white;
	border-bottom: 1px solid #ccc;
}
 
form > div > label{
	opacity: 0.3;
	font-weight: bold;
	position: absolute;
	top: 20px;
	left: 60px;
}
 
form > div > input[type="text"],
form > div > input[type="email"],
form > div > input[type="password"],
form > div > input[type="tel"]{
	width: 100%;
	border: 0;
	padding: 20px 20px 20px 60px;
	background: #f5f6f7;
}
 
form > div > input[type="text"]:focus,
form > div > input[type="email"]:focus,
form > div > input[type="password"]:focus,
form > div > input[type="tel"]:focus{
	outline: 0;
	background: white;
}
 
form > div > input[type="text"]:focus + label,
form > div > input[type="email"]:focus + label,
form > div > input[type="tel"]:focus + label,
form > div > input[type="date of birth"]:focus + label,
form > div > input[type="pincode"]:focus + label
form > div > input[type="password"]:focus + label,{
	opacity: 0;
}
 
form > div > input[type="text"]:valid,
form > div > input[type="email"]:valid,
form > div > input[type="tel"]:valid,
form > div > input[type="date of birth"]:valid,
form > div > input[type="password"]:valid{
	background: url('https://webdevtrick.com/wp-content/uploads/check-icon.svg');
	background-size: 20px;
	background-repeat: no-repeat;
	background-position: 415px 18px;
}
 
form > div > input[type="text"]:valid + label,
form > div > input[type="email"]:valid + label,
form > div > input[type="tel"]:valid + label,
form > div > input[type="date of birth"]:valid + label,
form > div > input[type="password"]:valid + label{
	opacity: 0;
}
 
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="tel"]:invalid:not(:focus):not(:placeholder-shown),
form > div > input[type="date of birth"]:invalid:not(:focus):not(:placeholder-shown)
form > div > input[type="password"]:invalid:not(:focus):not(:placeholder-shown),{
	background: url('https://webdevtrick.com/wp-content/uploads/xicon.svg');
	background-size: 20px;
	background-repeat: no-repeat;
	background-position: 415px 18px;
}
 
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown) + label,
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown) + label,
form > div > input[type="tel"]:invalid:not(:focus):not(:placeholder-shown) + label,
form > div > input[type="date of birth"]:invalid:not(:focus):not(:placeholder-shown) + label
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown) + label,{
	opacity: 0;
}
 
form > div > input[type="text"]:invalid:not(:focus):not(:placeholder-shown) ~ .requirements,
form > div > input[type="email"]:invalid:not(:focus):not(:placeholder-shown) ~ .requirements,
form > div > input[type="tel"]:invalid:not(:focus):not(:placeholder-shown) ~ .requirements,
form > div > input[type="date of birth"]:invalid:not(:focus):not(:placeholder-shown) ~ .requirements
form > div > input[type="password"]:invalid:not(:focus):not(:placeholder-shown) ~ .requirements,{
	margin-top: 5px;
	max-height: 200px;
	padding: 5px 30px 5px 50px;
	border-top: 1px dashed #aaa;
	background-color: whitesmoke;
}
 
form > div .requirements {
	padding: 0 30px 0 50px;
	color: #C73030;
	max-height: 0;
	transition: 0.28s;
	overflow: hidden;
	font-style: italic;
	font-size: 0.8em;
}
 
form input[type="submit"]{
	display: block;
	width: 100%;
	margin: 20px 0;
	background: #41D873;
	color: white;
	border: 0;
	padding: 20px;
	font-size: 1.2rem;
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      