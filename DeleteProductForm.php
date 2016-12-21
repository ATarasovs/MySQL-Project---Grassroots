<html>
<head>
<meta http-equiv="refresh" content="0; url=Product.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"]; 
// SQL Insert using variable names 
$sql = "SELECT productID FROM product WHERE productID='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result) >0){
mysql_query("Delete FROM product WHERE productID = '$id'", $db);
echo "A product was successfully removed <br>"; 	
}
else
{
	echo "There is no a product with such ID and last name";	
}

?> 
</body>
</html>