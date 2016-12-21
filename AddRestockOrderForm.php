<html>
<head>
<meta http-equiv="refresh" content="0; url=RestockOrder.php" />
</head>
<body>
<?php 
include "db.php"; 
// get content from form 
$branchid = $_POST["branchid"]; 
$restockprice = $_POST["restockprice"];
$quantity = $_POST["quantity"];
$productid = $_POST["productid"];
$supplierid = $_POST["supplierid"];
$today = date("Y-m-d H:i:s");
// SQL Insert using variable names 

if($restockprice==null)
{
	$restockprice = 0;
}
if($quantity==null)
{
	$quantity = 0;
}

mysql_query("INSERT INTO restockorder(restockID, branchID, restockPrice, restockQuantity, restockOrderDate, productID, supplierID) 
VALUES (restockID, '$branchid', '$restockprice', '$quantity', '$today', '$productid', '$supplierid')", $db);
echo "New restock order added <br>"; 

?> 
</body>
</html>