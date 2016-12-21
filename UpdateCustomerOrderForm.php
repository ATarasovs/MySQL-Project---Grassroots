<html>
<head>
<meta http-equiv="refresh" content="0; url=CustomerOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$id = $_POST["id"];
$quantity = $_POST["quantity"]; 
$productid = $_POST["productid"];
$customerid = $_POST["customerid"];
// SQL Insert using variable names 
$sql = "SELECT orderID FROM customerorder WHERE orderID='$id'";
$result = mysql_query($sql);

if(mysql_num_rows($result) <1){
	echo "There is no customer order with such ID";
}

else{
mysql_query("Update customerorder SET orderQuantity = '$quantity', productID = '$productid', customerID = '$customerid'
 WHERE orderID = '$id'", $db); 
echo "A customer order was successfully updated <br>"; 	
}

?> 
</body>
</html>