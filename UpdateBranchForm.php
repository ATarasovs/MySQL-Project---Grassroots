<html>
<head>
<meta http-equiv="refresh" content="0; url=Branch.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
// SQL Insert using variable names 
$sql = "SELECT branchID FROM branch WHERE branchID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no branch with such ID";
}
else{

mysql_query("Update branch SET bAddress = '$address', bCity = '$city', bPostcode = '$postcode' WHERE branchID = '$id'", $db); 
echo "Branch was successfully updated <br>"; 	
}

?> 
</body>
</html>