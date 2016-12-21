<html>
<head>
<meta http-equiv="refresh" content="0; url=custProfile.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$firstname = $_POST["firstname"]; 
$surname = $_POST["surname"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];

if ($_POST['password'] != ''){
$password = crypt($_POST['password'],'mysalt');
}
// SQL Insert using variable names 
$sql = "SELECT customerID FROM customer WHERE customerID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no customer with such ID";
}
else{
if($phonenumber==null)
{
	$phonenumber = 0;
}

mysql_query("Update customer SET cFname = '$firstname', cSurname = '$surname', cAddress = '$address', cCity = '$city', cPostcode = '$postcode', cEmail = '$email', cPhoneNumber = '$phonenumber', cPassword = '$password'
 WHERE customerID = '$id'", $db); 
echo "A customer was successfully updated <br>"; 	
}

?> 
</body>
</html>