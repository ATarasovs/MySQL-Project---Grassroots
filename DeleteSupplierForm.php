<html>
<head>
<meta http-equiv="refresh" content="0; url=Suppliers.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
// SQL Insert using variable names 
$sql = "SELECT supplierID FROM supplier WHERE supplierID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM supplier WHERE supplierID = '$id'", $db);
echo "A supplier was successfully removed <br>"; 	
}
else
{
	echo "There is no supplier with such ID and last name";	
}

?> 
</body>
</html>