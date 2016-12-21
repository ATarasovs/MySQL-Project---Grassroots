<html>
<head>
<meta http-equiv="refresh" content="0; url=Staff.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$firstname = $_POST["firstname"]; 
$surname = $_POST["surname"];
$position = $_POST["position"];
$salary = $_POST["salary"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$branch = $_POST["branch"];
$password = crypt($_POST['password'],'mysalt');
$privileges = $_POST["privileges"];
// SQL Insert using variable names 

if($salary==null)
{
	$salary = 0;
}

mysql_query("INSERT INTO staff(staffID, sFname, sSurname, position, salary, sAddress, sCity, sPostcode, sEmail, sPhoneNumber, branchID, password, privileges) 
VALUES (staffID, '$firstname', '$surname', '$position', '$salary', '$address', '$city', '$postcode', '$email', '$phonenumber', '$branch', '$password', '$privileges')", $db);
echo "New staff member added <br>"; 

?> 
</body>
</html>