<html>
<head>
<meta http-equiv="refresh" content="0; url=CustomerOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$quantity = $_POST["quantity"]; 
$today = date("Y-m-d H:i:s");
$productid = $_POST["productid"];
$customerid = $_POST["customerid"];
// SQL Insert using variable names 


//if($phonenumber==null)
//{
	//$phonenumber = 0;
//}
mysql_query("INSERT INTO customerOrder(orderID, orderQuantity, orderDate, productID, customerID) 
VALUES (orderID, '$quantity', '$today', '$productid', '$customerid')", $db);
echo "New customer order added <br>"; 


?> 
</body>
</html>