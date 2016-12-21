<html>
<head>
<meta http-equiv="refresh" content="0; url=custProducts.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$firstname = $_POST["firstname"]; 
$surname = $_POST["surname"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$password = crypt($_POST['password'],'mysalt');
// SQL Insert using variable names 



if($phonenumber==null)
{
	$phonenumber = 0;
}

//if($phonenumber==null)
//{
	//$phonenumber = 0;
//}
mysql_query("INSERT INTO customer(customerID, cFname, cSurname, cAddress, cCity, cPostcode, cEmail, cPhoneNumber, cPassword) 
VALUES (customerID, '$firstname', '$surname', '$address', '$city', '$postcode', '$email', '$phonenumber', '$password')", $db);
echo "New customer added <br>"; 


?> 
</body>
</html>