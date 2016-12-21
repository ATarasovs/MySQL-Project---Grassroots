<html>
<head>
<meta http-equiv="refresh" content="0; url=Suppliers.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form  
$name = $_POST["name"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
// SQL Insert using variable names 


if($phonenumber==null)
{
	$phonenumber = 0;
}

//if($phonenumber==null)
//{
	//$phonenumber = 0;
//}
mysql_query("INSERT INTO supplier(supplierID, supplierName, spAddress, spCity, spPostcode, spEmail, spPhoneNumber) 
VALUES (supplierID, '$name', '$address', '$city', '$postcode', '$email', '$phonenumber')", $db);
echo "New supplier added <br>"; 


?> 
</body>
</html>