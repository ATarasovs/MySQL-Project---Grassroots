<html>
<head>
<meta http-equiv="refresh" content="0; url=CustomerOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
// SQL Insert using variable names 
$sql = "SELECT orderID FROM customerorder WHERE orderID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM customerorder WHERE orderID = '$id'", $db);
echo "A customer order was successfully removed <br>"; 	
}
else
{
	echo "There is no customer order with such ID and last name";	
}

?> 
</body>
</html>