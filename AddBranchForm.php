<html>
<head>
<meta http-equiv="refresh" content="0; url=Branch.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
// SQL Insert using variable names 


//if($phonenumber==null)
//{
	//$phonenumber = 0;
//}
mysql_query("INSERT INTO branch(branchID, bAddress, bCity, bPostcode) 
VALUES (branchID, '$address', '$city', '$postcode')", $db);
echo "New branch added <br>"; 


?> 
</body>
</html>