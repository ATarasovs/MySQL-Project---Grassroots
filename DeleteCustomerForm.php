<html>
<head>
<meta http-equiv="refresh" content="0; url=Customers.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$lastname = $_POST["lastname"]; 
// SQL Insert using variable names 
$sql = "SELECT customerID, cSurname FROM customer WHERE customerID='$id' and cSurname='$lastname'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM customer WHERE customerID = '$id' AND cSurname = '$lastname'", $db);
echo "A customer was successfully removed <br>"; 	
}
else
{
	echo "There is no customer with such ID and last name";	
}

?> 
</body>
</html>