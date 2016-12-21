<html>
<head>
<meta http-equiv="refresh" content="0; url=Suppliers.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$name = $_POST["name"]; 
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
// SQL Insert using variable names 
$sql = "SELECT supplierID FROM supplier WHERE supplierID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no supplier with such ID";
}
else{
if($phonenumber==null)
{
	$phonenumber = 0;
}

mysql_query("Update supplier SET supplierName = '$name', spAddress = '$address', spCity = '$city', spPostcode = '$postcode', spEmail = '$email', spPhoneNumber = '$phonenumber'
 WHERE supplierID = '$id'", $db); 
echo "A supplier was successfully updated <br>"; 	
}

?> 
</body>
</html>